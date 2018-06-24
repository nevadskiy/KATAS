<?php

/**
 * Class Asterixer
 */
class Asterixer
{
    /**
     * @var string
     */
    protected $hashChar = '*';
    
    /**
     * @return \Asterixer
     */
    public static function make()
    {
        return new self();
    }
    
    /**
     * @param string $email
     * @return string
     */
    public function email(string $email)
    {
        list($username, $domain) = $this->validateAndExplode($email);
        
        return $this->getAsterixedUsername($username).'@'.$domain;
    }
    
    /**
     * @param string $username
     * @return string
     */
    protected function getAsterixedUsername(string $username)
    {
        $len = mb_strlen($username);

        if ($len < 4) return $this->asterixTiny($username, $len -1);
        if ($len < 6) return $this->asterixShort($username, $len - 2);

        return $this->asterixLong($username, $len - 4);
    }

    /**
     * @param string $username
     * @param int $multiplier
     * @return string
     */
    protected function asterixTiny(string $username, int $multiplier)
    {
        return $username[0].str_repeat($this->hashChar, $multiplier);
    }

    /**
     * @param string $username
     * @param int $multiplier
     * @return string
     */
    protected function asterixShort(string $username, int $multiplier)
    {
        return $this->asterixTiny($username, $multiplier).$username[$multiplier + 1];
    }

    /**
     * @param string $username
     * @return string
     */
    protected function asterixLong(string $username, int $multiplier)
    {
        return ''
            .substr($username, 0, 2)
            .str_repeat($this->hashChar, $multiplier)
            .substr($username, -2);
    }
    
    /**
     * @param string $email
     * @return array
     */
    protected function validateAndExplode(string $email)
    {
        $emailExploded = explode('@', $email);
        
        if (! isset($emailExploded[ 1 ]) || '' === $emailExploded[ 0 ]) {
            throw new InvalidArgumentException($email.' is not valid');
        }
        
        return $emailExploded;
    }
}
