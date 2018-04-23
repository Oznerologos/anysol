#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Abonnement
#------------------------------------------------------------

CREATE TABLE Abonnement(
        AbonnementID   int (11) Auto_increment  NOT NULL ,
        AbonnementNom  Varchar (25) ,
        AbonnementDesc Varchar (100) ,
        AbonnementPrix DECIMAL (15,3)  ,
        PRIMARY KEY (AbonnementID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        UserID        int (11) Auto_increment  NOT NULL ,
        UserNom       Varchar (25) ,
        UserPrenom    Varchar (25) ,
        UserBirthdate Date ,
        AbonnementID  Int ,
        LoginID       Int ,
        AdresseID     Int NOT NULL ,
        PRIMARY KEY (UserID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: LoginInfo
#------------------------------------------------------------

CREATE TABLE LoginInfo(
        LoginID      int (11) Auto_increment  NOT NULL ,
        UserMail     Varchar (50) ,
        UserPassword Varchar (25) ,
        UserID       Int ,
        PRIMARY KEY (LoginID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Playlist
#------------------------------------------------------------

CREATE TABLE Playlist(
        PlaylistID   int (11) Auto_increment  NOT NULL ,
        PlaylistNom  Varchar (25) ,
        PlaylistDesc Varchar (500) ,
        UserID       Int ,
        PRIMARY KEY (PlaylistID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Musique
#------------------------------------------------------------

CREATE TABLE Musique(
        MusiqueID       int (11) Auto_increment  NOT NULL ,
        MusiqueNom      Varchar (25) ,
        MusiqueDuration Time ,
        MusiqueYearOut  Date ,
        PRIMARY KEY (MusiqueID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Artiste
#------------------------------------------------------------

CREATE TABLE Artiste(
        ArtisteID  int (11) Auto_increment  NOT NULL ,
        ArtisteNom Varchar (25) ,
        ArtisteBio Text ,
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
        AlbumNom     Varchar (25) ,
        AlbumYearOut Date ,
        PRIMARY KEY (AlbumID )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Adresse
#------------------------------------------------------------

CREATE TABLE Adresse(
        AdresseID     int (11) Auto_increment  NOT NULL ,
        AdrPostal     Varchar (10) ,
        AdrRue        Varchar (50) ,
        AdrRueNum     Varchar (5) ,
        AdrComplement Text ,
        AdrVille      Varchar (30) ,
        UserID        Int ,
        PRIMARY KEY (AdresseID )
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

ALTER TABLE User ADD CONSTRAINT FK_User_AbonnementID FOREIGN KEY (AbonnementID) REFERENCES Abonnement(AbonnementID);
ALTER TABLE User ADD CONSTRAINT FK_User_LoginID FOREIGN KEY (LoginID) REFERENCES LoginInfo(LoginID);
ALTER TABLE User ADD CONSTRAINT FK_User_AdresseID FOREIGN KEY (AdresseID) REFERENCES Adresse(AdresseID);
ALTER TABLE LoginInfo ADD CONSTRAINT FK_LoginInfo_UserID FOREIGN KEY (UserID) REFERENCES User(UserID);
ALTER TABLE Playlist ADD CONSTRAINT FK_Playlist_UserID FOREIGN KEY (UserID) REFERENCES User(UserID);
ALTER TABLE Adresse ADD CONSTRAINT FK_Adresse_UserID FOREIGN KEY (UserID) REFERENCES User(UserID);
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
