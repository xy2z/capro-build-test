<?php

namespace _PhpScoper5e9ecd738c28\Illuminate\Contracts\Validation;

interface ValidatorAwareRule
{
    /**
     * Set the current validator.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return $this
     */
    public function setValidator($validator);
}
