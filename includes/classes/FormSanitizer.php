<?php
    class FormSanitizer
    {
        public static function sanitizeform($inputText)
        {
            $inputText = strip_tags($inputText);
            $inputText = str_replace(" ","",$inputText);
            return $inputText;
        }
        public static function sanitizePassword($inputText)
        {
            $inputText = strip_tags($inputText);
            return $inputText;
        }
    }
?>