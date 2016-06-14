<?php

/**
 * Created by PhpStorm.
 * User: cote
 * Date: 11/06/16
 * Time: 08:50
 */
class Membre {

  private $pseudo;
  private $age;
  private $email;
  private $actif;

  /**
   * membre constructor.
   */
  public function __construct ( $pseudo = null ) {

    // Vérifier si le nouveau pseudo n'est ni vide ni trop long
    if ( ! empty( $pseudo ) AND strlen ( $pseudo ) < 15 ) {
      // Ok, on change son pseudo
      $this->pseudo = $pseudo;
    }
  }

  /**
   * @return mixed
   */
  public function getPseudo () {

    return $this->pseudo;
  }

  /**
   * @param mixed $pseudo
   */
  public function setPseudo ( $pseudo ) {

    $this->pseudo = $pseudo;
  }

  /**
   * @return mixed
   */
  public function getAge () {

    return $this->age;
  }

  /**
   * @param mixed $age
   */
  public function setAge ( $age ) {

    $this->age = $age;
  }

  /**
   * @return mixed
   */
  public function getActif () {

    return $this->actif;
  }

  /**
   * @param mixed $actif
   */
  public function setActif ( $actif ) {

    $this->actif = $actif;
  }

  /**
   * @return mixed
   */
  public function getEmail () {

    return $this->email;
  }

  /**
   * @param mixed $email
   */
  public function setEmail ( $email ) {

    $this->email = $email;
  }

}
