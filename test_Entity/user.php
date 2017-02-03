<?php

//namespace Entity;
	/**
	 * @Entity @Table(name="cloud_saad")
	**/
	class User {

		/** @Id	@Column(type="integer") @GeneratedValue **/
		protected $id;

		/** @Column(type="string") **/
		protected $name;

		/** @Column(type="string") **/
		protected $password;
		
	
		public function getName()
	    {
	        return $this->name;
	    }

	    public function setName($name)
	    {
	        $this->name = $name;
	    }

	    public function getPassword()
	    {
	        return $this->password;
	    }

	    public function setPassword($password)
	    {
	        $this->password = $password;
	    }

	}

?>