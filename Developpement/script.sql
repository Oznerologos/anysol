CREATE DATABASE IF NOT EXISTS Anysol;
USE Anysol;

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Abonnement
#------------------------------------------------------------

CREATE TABLE Abonnement(
        AbonnementID   int (11) Auto_increment  NOT NULL ,
        AbonnementNom  Varchar (25) NOT NULL,
        AbonnementDesc Varchar (100) NOT NULL,
        AbonnementPrix DECIMAL (15,3)  NOT NULL,
        PRIMARY KEY (AbonnementID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User_
#------------------------------------------------------------

CREATE TABLE User_(
        UserID        int (11) Auto_increment  NOT NULL ,
        UserNom       Varchar (25) NOT NULL,
        UserPrenom    Varchar (25) NOT NULL,
        UserBirthdate Date NOT NULL,
        UserTel varchar (15) NOT NULL,
        UserSex ENUM ('m', 'f'),
        UserAdhesion date NOT NULL,
        AbonnementID  Int NOT NULL,
        PRIMARY KEY (UserID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LoginInfo
#------------------------------------------------------------

CREATE TABLE LoginInfo(
        UserMail     Varchar (50) NOT NULL,
        UserPassword Varchar (25) NOT NULL,
        UserID       Int NOT NULL
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Playlist
#------------------------------------------------------------

CREATE TABLE Playlist(
        PlaylistID   int (11) Auto_increment  NOT NULL ,
        PlaylistNom  Varchar (25) NOT NULL,
        PlaylistDesc Varchar (500) NOT NULL,
        UserID       Int NOT NULL,
        PRIMARY KEY (PlaylistID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Musique
#------------------------------------------------------------

CREATE TABLE Musique(
        MusiqueID       int (11) Auto_increment  NOT NULL ,
        MusiqueNom      Varchar (25) NOT NULL,
        MusiqueDuration Time NOT NULL,
        MusiqueYearOut  VARCHAR(4) NOT NULL,
        MusiqueChemin varchar (250),
        PRIMARY KEY (MusiqueID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Artiste
#------------------------------------------------------------

CREATE TABLE Artiste(
        ArtisteID  int (11) Auto_increment  NOT NULL ,
        ArtisteNom Varchar (25) NOT NULL,
        ArtisteBio Text NOT NULL,
        PRIMARY KEY (ArtisteID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Genre
#------------------------------------------------------------

CREATE TABLE Genre(
        GenreID  int (11) Auto_increment  NOT NULL ,
        GenreNom Varchar (25) NOT NULL ,
        PRIMARY KEY (GenreID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Album
#------------------------------------------------------------

CREATE TABLE Album(
        AlbumID      int (11) Auto_increment  NOT NULL ,
        AlbumNom     Varchar (25) NOT NULL,
        AlbumYearOut Date NOT NULL,
        AlbumPhoto varchar (250),
        PRIMARY KEY (AlbumID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Adresse
#------------------------------------------------------------

CREATE TABLE Adresse(
        AdrPostal     Varchar (10) NOT NULL,
        AdrRue        Varchar (50) NOT NULL,
        AdrRueNum     Varchar (5) NOT NULL,
        AdrComplement Text NOT NULL,
        AdrVille      Varchar (30) NOT NULL,
        UserID        Int NOT NULL
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: link_musique_playlist
#------------------------------------------------------------

CREATE TABLE link_musique_playlist(
        PlaylistID Int NOT NULL ,
        MusiqueID  Int NOT NULL ,
        PRIMARY KEY (PlaylistID ,MusiqueID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: link_musique_artiste
#------------------------------------------------------------

CREATE TABLE link_musique_artiste(
        MusiqueID Int NOT NULL ,
        ArtisteID Int NOT NULL ,
        PRIMARY KEY (MusiqueID ,ArtisteID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: link_musique_genre
#------------------------------------------------------------

CREATE TABLE link_musique_genre(
        MusiqueID Int NOT NULL ,
        GenreID   Int NOT NULL ,
        PRIMARY KEY (MusiqueID ,GenreID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: link_musique_album
#------------------------------------------------------------

CREATE TABLE link_musique_album(
        MusiqueID Int NOT NULL ,
        AlbumID   Int NOT NULL ,
        PRIMARY KEY (MusiqueID ,AlbumID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: link_artiste_album
#------------------------------------------------------------

CREATE TABLE link_artiste_album(
        ArtisteID Int NOT NULL ,
        AlbumID   Int NOT NULL ,
        PRIMARY KEY (ArtisteID ,AlbumID )
)ENGINE=InnoDB;

ALTER TABLE LoginInfo ADD CONSTRAINT FK_LoginInfo_UserID FOREIGN KEY (UserID) REFERENCES User_(UserID);
ALTER TABLE Playlist ADD CONSTRAINT FK_Playlist_UserID FOREIGN KEY (UserID) REFERENCES User_(UserID);
ALTER TABLE Adresse ADD CONSTRAINT FK_Adresse_UserID FOREIGN KEY (UserID) REFERENCES User_(UserID);
ALTER TABLE link_musique_playlist ADD CONSTRAINT FK_link_musique_playlist_PlaylistID FOREIGN KEY (PlaylistID) REFERENCES Playlist(PlaylistID);
ALTER TABLE link_musique_playlist ADD CONSTRAINT FK_link_musique_playlist_MusiqueID FOREIGN KEY (MusiqueID) REFERENCES Musique(MusiqueID);
ALTER TABLE link_musique_artiste ADD CONSTRAINT FK_link_musique_artiste_MusiqueID FOREIGN KEY (MusiqueID) REFERENCES Musique(MusiqueID);
ALTER TABLE link_musique_artiste ADD CONSTRAINT FK_link_musique_artiste_ArtisteID FOREIGN KEY (ArtisteID) REFERENCES Artiste(ArtisteID);
ALTER TABLE link_musique_genre ADD CONSTRAINT FK_link_musique_genre_MusiqueID FOREIGN KEY (MusiqueID) REFERENCES Musique(MusiqueID);
ALTER TABLE link_musique_genre ADD CONSTRAINT FK_link_musique_genre_GenreID FOREIGN KEY (GenreID) REFERENCES Genre(GenreID);
ALTER TABLE link_musique_album ADD CONSTRAINT FK_link_musique_album_MusiqueID FOREIGN KEY (MusiqueID) REFERENCES Musique(MusiqueID);
ALTER TABLE link_musique_album ADD CONSTRAINT FK_link_musique_album_AlbumID FOREIGN KEY (AlbumID) REFERENCES Album(AlbumID);
ALTER TABLE link_artiste_album ADD CONSTRAINT FK_link_artiste_album_ArtisteID FOREIGN KEY (ArtisteID) REFERENCES Artiste(ArtisteID);
ALTER TABLE link_artiste_album ADD CONSTRAINT FK_link_artiste_album_AlbumID FOREIGN KEY (AlbumID) REFERENCES Album(AlbumID);
