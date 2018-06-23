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
        switch (mb_strlen($username)) {
            case 1:
                return $username[0];
                break;
            case 2:
                return $username[0].$this->hashChar;
                break;
            case 3:
                return $username[0].str_repeat($this->hashChar, 2);
                break;
            case 4:
                return $username[0].str_repeat($this->hashChar, 2).$username[3];
                break;
            default:
                return $this->asterixLong($username);
        }
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
    
    /**
     * @param string $username
     * @return string
     */
    protected function asterixLong(string $username)
    {
        return ''
            .substr($username, 0, 2)
            .str_repeat($this->hashChar, mb_strlen($username) - 4)
            .substr($username, -2);
    }
}
