<?php
namespace App\Model;
use App\Utils\BddConnect;
use App\Model\Chocoblast;
use App\Model\Utilisateur;
class Commentaire extends BddConnect{
    // ------- Attributs -----------

    private ?int $id_commentaire;
    private ?int $note_commentaire;
    private ?string $text_commentaire;
    private ?string $date_commentaire;
    private ?bool $statut_commentaire;
    private ?Chocoblast $id_chocoblast;
    private ?Utilisateur $auteur_commentaire;

// --------- Constructeur --------------

public function __construct(){
    $this->id_chocoblast = new Chocoblast();
    $this->auteur_commentaire = new Utilisateur();
    $this->statut_commentaire = true;
}

// --------- Getter et setter -----------

public function getIdCommentaire():?int{
    return $this->id_commentaire;
}
public function getNoteCommentaire():?int{
    return $this->note_commentaire;
}
public function getTextCommentaire():?string{
    return $this->text_commentaire;
}
public function getDateCommentaire():?string{
    return $this->date_commentaire;
}
public function getStatutCommentaire():?bool{
    return $this->statut_commentaire;
}
public function getChocoblastCommentaire():?Chocoblast{
    return $this->id_chocoblast;
}
public function getAuteurCommentaire():?Utilisateur{
    return $this->auteur_commentaire;
}
public function setIdCommentaire(?int $id):void{
    $this->id_commentaire = $id;
}
public function setNoteCommentaire(?int $note):void{
    $this->note_commentaire = $note;
}
public function setTextCommentaire(?string $text):void{
    $this->text_commentaire = $text;
}
public function setDateCommentaire(?string $date):void{
    $this->date_commentaire = $date;
}
public function setStatutCommentaire(?bool $statut):void{
    $this->statut_commentaire = $statut;
}
public function setChocoblastCommentaire(?Chocoblast $choco):void{
    $this->id_chocoblast = $choco;
}
public function setAuteurCommentaire(?Utilisateur $auteur):void{
    $this->auteur_commentaire = $auteur;
}
    
// ------------Méthodes------------

public function addCommentaire():void{
    try{
        $note = $this->getNoteCommentaire();
        $date = $this->getDateCommentaire();
        $text = $this->getTextCommentaire();
        $statut = $this->getStatutCommentaire();
        $auteur= $this->getAuteurCommentaire()->getIdUtilisateur();
        $choco = $this->getChocoblastCommentaire()->getIdChocoblast();

        $req = $this->connexion()->prepare('INSERT INTO commentaire(note_commentaire, date_commentaire, text_commentaire, statut_commentaire, auteur_commentaire, id_chocoblast) VALUES (?,?,?,?,?,?)');

        $req->bindParam(1, $note, \PDO::PARAM_INT);
        $req->bindParam(2, $date, \PDO::PARAM_STR);
        $req->bindParam(3, $text, \PDO::PARAM_STR);
        $req->bindParam(4, $statut, \PDO::PARAM_BOOL);
        $req->bindParam(5, $auteur, \PDO::PARAM_INT);
        $req->bindParam(6, $choco, \PDO::PARAM_INT);

        $req->execute();

    }
    catch(\Exception $e){
        die('Error : '.$e->getMessage());
    }

}


public function __toString(){
    return $this->text_commentaire;
}
















public function getCommentaireByInfo():?array{

    $note = $this->getNoteCommentaire();
    $date = $this->getDateCommentaire();
    $text = $this->getTextCommentaire();
    $auteur = $this->getAuteurCommentaire()->getIdUtilisateur();
    $choco = $this->getChocoblastCommentaire()->getIdChocoblast();
  
    $req = $this->connexion()->prepare('SELECT id_commentaire, note_chocoblast, text_chocoblast 
    FROM commentaire WHERE note_commantaire = ? AND text_commentaire = ? AND date_commentaire= ?
    AND auteur_commentaire = ? AND chocoblast_commentaire = ?');
   
    $req->bindParam(1, $note, \PDO::PARAM_STR);
    $req->bindParam(2, $date, \PDO::PARAM_STR);
    $req->bindParam(3, $text, \PDO::PARAM_STR);
    $req->bindParam(4, $auteur, \PDO::PARAM_INT);
    $req->bindParam(5, $choco, \PDO::PARAM_INT);

    $req->execute();

    $data = $req->fetchAll(\PDO::FETCH_OBJ);
    //Retourner le tableau
    return $data;
}
}





?>