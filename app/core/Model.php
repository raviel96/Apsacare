<?php
namespace app\core;

abstract class Model {

    public const RULE_REQUIRED = "required";
    public const RULE_NAME = "name";
    public const RULE_EMAIL = "email";
    public const RULE_MIN = "min";
    public const RULE_MATCH = "match";
    public const RULE_PHONE = "phone";
    public const RULE_UNIQUE = "unique";

    public array $errors = [];

    public function loadData($data) {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules();

    public function labels(): array {
        return [];
    }

    public function getLabel($attribute) {
        return $this->labels()[$attribute] ?? $attribute;
    }

    public function validate() {
        foreach($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            
            foreach($rules as $rule) {
                $ruleName = $rule;

                switch($ruleName) {
                    case ($ruleName === self::RULE_REQUIRED && !$value) : 
                        $this->addErrorForRule($attribute, self::RULE_REQUIRED);
                        break;
                    case ($ruleName === self::RULE_NAME) :
                        if($value) {
                            if(!preg_match("/^[A-Z-\p{L}]+$/i",$value)) {
                                $this->addErrorForRule($attribute, self::RULE_NAME);    
                            }
                        }
                        break;
                    case ($ruleName === self::RULE_MIN) :

                        if($value) {
                            
                            $minChar = 3;
                            
                            if(strlen($value) < $minChar) {
                                $this->addErrorForRule($attribute, self::RULE_MIN, ["min" => $minChar]);
                            }
                            
                        }
                        break;
                    case ($ruleName == self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)):
                            $this->addErrorForRule($attribute, self::RULE_EMAIL);
                            break; 
                    case ($ruleName == self::RULE_PHONE):
                            if($value) {
                                if(!preg_match("/^[\d\s\+\-]+$/",$value)) {
                                    $this->addErrorForRule($attribute, self::RULE_PHONE);
                                }
                            }
                            break;
                    default:
                        break;
                }

            }
        }

        return empty($this->errors);
    }

    /**
     * Ajoute le message d'erreur pour l'attribut/champ qui correspond
     * @param mixed $attribute Le nom de l'attribut/champ
     * @param mixed $rule Le nom de la règle
     * @param mixed $params Un tableau de paramètre supplémentaire
     */
    private function addErrorForRule(string $attribute, string $rule, $params = []) {
        $message = $this->errorMessages()[$rule] ?? '';
        
        foreach($params as $key => $value) {
            $message = str_replace("{{$key}}", $value, $message);
        }
        
        $this->errors[$attribute][] = $message;
    }

    public function addError(string $attribute, string $messages) {
        $this->errors[$attribute][] = $messages;
    }

    /**
     * Liste des messages d'erreurs pour chacunes des règles
     * @return array Retourne le tableau des messages d'erreurs pour chaque règle
     */
    public function errorMessages() {
        return [
            self::RULE_REQUIRED => 'Champ obligatoire',
            self::RULE_NAME => 'Ce champ est invalide',
            self::RULE_MIN => 'Ce champ doit contenir au moins {min} caractères',
            self::RULE_MATCH => 'Ce champ doit être identique au champ "{match}"',
            self::RULE_EMAIL => 'Veuillez saisir une adresse e-mail valide',
            self::RULE_PHONE => 'Veuillez saisir un numéro valide'
        ];
    }

    /**
     * Regarde dans le tableau des erreurs si l'attribut/champ possèdes des erreurs
     * @param mixed $attribute Attribut qu'on va vérifier
     * @return mixed Retourne l'erreur pour l'attribut/champ ou false si il n'y en a pas
     */
    public function hasErrors($attribute) {
        return $this->errors[$attribute] ?? false;
    }

    /**
     * Recupère la première erreur pour l'attribut/champ
     * @return mixed Retourne la première erreur de l'attribut/champ , ou false si il n'y en a pas
     */
    public function getFirstError($attribute) {
        return $this->errors[$attribute][0] ?? false;
    }
}