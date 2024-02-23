-- CREATE 

CREATE TABLE curso (
	idCurso	            INT PRIMARY KEY AUTO_INCREMENT,  
    nome			    VARCHAR(100) not null,
    nivel			    VARCHAR(100) not null,
    duracao	            INT not null,
    valorTotal			DECIMAL(10,2) not null,
    descricao			VARCHAR(200) not null
);

-- PROCEDURES

DELIMITER //

CREATE PROCEDURE piCurso (
	IN _nome				VARCHAR(100),
    IN _nivel				VARCHAR(100),
    IN _duracao				INT,
    IN _valorTotal			DECIMAL(10,2),
    IN _descricao			VARCHAR(200)
)
BEGIN
	INSERT INTO curso (nome, nivel, duracao, valorTotal, descricao) 
    VALUES (_nome, _nivel, _duracao , _valorTotal, _descricao);
END //



DELIMITER //

CREATE PROCEDURE psCurso (
  	IN _id		INT
)

BEGIN
SELECT * FROM curso
WHERE idCurso = _id;

END //

DELIMITER //
 
create procedure psListarCurso(
IN _nome varchar(100)
)
 
BEGIN

SELECT * FROM curso

WHERE nome LIKE CONCAT(_nome, '%');

END //

DELIMITER //
CREATE PROCEDURE pdCurso
(
	IN 	_id		INT
)
BEGIN
	DELETE FROM curso WHERE idCurso = _id;
END //
DELIMITER //
CREATE PROCEDURE puCurso
(
	IN	_id						INT,
    IN	_nome					VARCHAR(100),
    IN _nivel					VARCHAR(100),
    IN _duracao					INT,
    IN _valorTotal				DECIMAL(10,2),
    IN _descricao				VARCHAR(200)
)
BEGIN
	UPDATE curso
    	SET nome = _nome,
        	valorUnitario = _valor
    WHERE idCurso = _id;
END //