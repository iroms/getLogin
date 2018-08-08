<?php

    namespace Iroms;

    class GetLogin
    {

        public function getLogin($name, $surname, $maxLength = 20)
        {

            function translit($text)
            {

                $translitRule = array(
                    'а' => "a",
                    'б' => "b",
                    'в' => "v",
                    'г' => "g",
                    'д' => "d",
                    'е' => "e",
                    'ё' => "e",
                    'ж' => "zh",
                    'з' => "z",
                    'и' => "i",
                    'й' => "j",
                    'к' => "k",
                    'л' => "l",
                    'м' => "m",
                    'н' => "n",
                    'о' => "o",
                    'п' => "p",
                    'р' => "r",
                    'с' => "s",
                    'т' => "t",
                    'у' => "u",
                    'ф' => "f",
                    'х' => "h",
                    'ц' => "tc",
                    'ч' => "ch",
                    'ш' => "sh",
                    'щ' => "shh",
                    'ъ' => "",
                    'ы' => "y",
                    'ь' => "",
                    'э' => "e",
                    'ю' => "yu",
                    'я' => "ya",
                );

                $text = mb_strtolower($text);                   // нижний регистр
                $text = strtr($text, $translitRule);            // собственно транслитерация
                $text = preg_replace('/[^a-z]/', '', $text);    // убирание всех символов, кроме латиницы и кириллицы
                return $text;

            }


            $login = translit($name).'.'.translit($surname);

            if (strlen($login) > $maxLength)
            {
                $login = translit($surname);

                if (strlen($login) > $maxLength)
                {
                    $login = substr($login, 0, $maxLength);
                }
            }

            return $login;

        }

    }


