<?php

namespace Shop\SklepBundle\Entity;

class Ask
{
	protected $name;

	protected $email;

	protected $content;

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		 $this->name = $name;
	}


	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		 $this->email = $email;
	}


	public function getContent()
	{
		return $this->content;
	}

	public function setContent($content)
	{
		 $this->content = $content;
	}

	public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());

        $metadata->addPropertyConstraint('email', new Email());

        $metadata->addPropertyConstraint('content', new NotBlank());

    }

}