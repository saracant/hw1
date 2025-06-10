CREATE DATABASE sapori_del_vigneto;
USE sapori_del_vigneto;

CREATE TABLE utenti
(
id INT PRIMARY KEY,
username VARCHAR(255),
PASSWORD VARCHAR(255)
);

CREATE TABLE remeber_token 
(
id INT PRIMARY KEY,
user_id INT,
selector VARCHAR(255),
hashed_validator VARCHAR(255),
expires DATETIME,
FOREIGN KEY (user_id) REFERENCES utenti(id)
);

CREATE TABLE prodotti (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
descrizione TEXT,
prezzo DECIMAL(10,2),
immagine_url VARCHAR(255),
categoria VARCHAR(255)
);

CREATE TABLE carrello_aticoli (
id INT PRIMARY KEY AUTO_INCREMENT,
session_id VARCHAR(255),
prodotto_id INT,
quantita INT,
data_aggiunta TIMESTAMP,
FOREIGN KEY (prodotto_id) REFERENCES prodotti(id)
);

CREATE TABLE eventi (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
descrizione TEXT,
data_evento DATETIME,
luogo VARCHAR(255),
immagine_url VARCHAR(255), 
posti_disponibili INT
);

CREATE TABLE prenotazioni (
id INT  primary key AUTO_INCREMENT,
id_utente INT,
id_evento INT,
data_prenotazione DATETIME,
numero_posti INT,
FOREIGN KEY (id_utente) REFERENCES utenti(id),
FOREIGN KEY (id_evento) REFERENCES eventi(id),
UNIQUE (id_utente,id_evento) 
);

CREATE TABLE messaggio_contatti (
id INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(255),
cognome VARCHAR(255),
email VARCHAR(255),
telefono VARCHAR(255),
messaggio TEXT,
data_invio TIMESTAMP DEFAULT current_timestamp
);

INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Vino Rosso','Vino Rosso',10.50,'rosso.jpeg','Vino Rosso');
INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Vino Bianco','Vino Bianco',10.50,'bianco.jpeg','Vino Bianco');
INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Vino Rosato','Vino Rosato',10.50,'rosato.jpeg','Vino Rosato');
INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Prosecco','Prosecco',10.50,'prosecco_1.jpeg','Prosecco');
INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Vino Rosato','Vino Rosato',10.50,'rosato.jpeg','Vino Rosato');
INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Spumante','Spumante',10.50,'spumante.jpeg','Spumante');
INSERT INTO prodotti (nome,descrizione,prezzo,immagine_url,categoria) VALUES ('Vino Rosato','Vino Rosato',10.50,'rosato.jpeg','Vino Rosato');

INSERT INTO eventi (nome,descrizione,data_evento,luogo,immagine_url,posti_disponibili) VALUES ('Evento_1','Degustazione','2025-08-10 18:00:00', 'Cantina','vigna.jpeg',100);
INSERT INTO eventi (nome,descrizione,data_evento,luogo,immagine_url,posti_disponibili) VALUES ('Evento_2','Degustazione','2025-08-10 18:00:00', 'Cantina','vigna.jpeg',100);
INSERT INTO eventi (nome,descrizione,data_evento,luogo,immagine_url,posti_disponibili) VALUES ('Evento_3','Degustazione','2025-08-10 18:00:00', 'Cantina','vigna.jpeg',100);

