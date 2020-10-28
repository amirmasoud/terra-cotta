<?php

trait Fields
{
    // One
    public function setEmailFieldName($email)
    {
        return 'email';
    }

    public function setEmailFieldDescription($email)
    {
        return 'An email field.';
    }

    public function setEmailFieldType($email)
    {
        return Type::string();
    }

    public function setEmailFieldRules($email)
    {
        return [
            'email|max:250'
        ];
    }

    // All
    public function getNameField($value)
    {
        return [
            'name' => 'email',
            'description' => 'An email field.',
            'type' => Type::string(),
            'rules' => ['max:250']
        ];
    }
}
