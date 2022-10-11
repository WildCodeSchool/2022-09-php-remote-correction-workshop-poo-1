<?php

/* Fighter class definition */

class Fighter
{
    public const MAX_LIFE = 100;

    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life = self::MAX_LIFE;

    public function __construct(
        string $name,
        int $strength, 
        int $dexterity
    ) {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of strength
     */ 
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * Set the value of strength
     *
     * @return  self
     */ 
    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * Get the value of dexterity
     */ 
    public function getDexterity()
    {
        return $this->dexterity;
    }

    /**
     * Set the value of dexterity
     *
     * @return  self
     */ 
    public function setDexterity(int $dexterity): self
    {
        $this->dexterity = $dexterity;

        return $this;
    }

    /**
     * Get the value of life
     */ 
    public function getLife()
    {
        return $this->life;
    }

    /**
     * Set the value of life
     *
     * @return  self
     */ 
    public function setLife(int $life): self
    {
        $this->life = $life > 0 ? $life : 0;

        return $this;
    }

    public function fight(Fighter $target): string
    {
        //on génère un nombre aléatoire
        $strengthOfFight = rand(1, $this->strength);

        //on calcule les dommages causés à l'adversaire
        $damages = $strengthOfFight - $target->getDexterity();
        if ($damages < 0) {
            $damages = 0;
        }

        //on calcule les nouveaux de vie de l'adversaire
        $targetLife = $target->getLife() - $damages;

        //on affecte les nouveaux point de vie à l'adversaire
        $target->setLife($targetLife);
        // $target->setLife($target->getLife() - $damages);
        return $this->name . " attaque 🗡  💙 " . $target->getName() . ": " . $target->getLife(); 
    }

    public function isAlive(): bool
    {
        return $this->life > 0;
    }
}
