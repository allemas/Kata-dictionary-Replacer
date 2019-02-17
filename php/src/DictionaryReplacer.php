<?php

class DictionaryReplacer
{
    public function replace($input, $dictionary)
    {
        if ($input === '') {
            return '';
        }

        foreach ($dictionary as $item => $rep) {
            if (strpos($input, '$' . $item . '$') > -1) {
                $input = (str_replace('$' . $item . '$', $rep, $input));
            }
        }

        return $input;
    }
}