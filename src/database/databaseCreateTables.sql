CREATE TABLE funcionario (
    cpf VARCHAR(11),
	nome VARCHAR(50) NOT NULL,
    passwordHash VARCHAR(256) NOT NULL,
    tipoFuncionario ENUM('ENFERMEIRO', 'ANALISTA_CLINICO', 'SUPERVISOR') NOT NULL,
    PRIMARY KEY(cpf)
);

CREATE TABLE auth (
    cpfFuncionario VARCHAR(11),
    token VARCHAR(256),
    PRIMARY KEY(cpfFuncionario, token),
    FOREIGN KEY (cpfFuncionario) REFERENCES funcionario(cpf)
);

CREATE TABLE amostra (
    idAmostra INTEGER AUTO_INCREMENT,
    tipoAmostra VARCHAR(100) NOT NULL,
    dataColeta DATETIME NOT NULL,
    cpfResponsavel VARCHAR(11) NOT NULL,
    PRIMARY KEY (idAmostra),
    FOREIGN KEY (cpfResponsavel) REFERENCES funcionario(cpf)
);

CREATE TABLE exame (
    numeroExame INTEGER AUTO_INCREMENT,
    status ENUM('AGUARDANDO COLETA', 'EM ANALISE', 'AGUARDANDO LAUDO', 'LIBERADO', 'NOVA COLETA SOLICITADA') NOT NULL,
    resultado TEXT,
    amostra INTEGER,
    cpfAnalista VARCHAR(11),
    cpfSupervisor VARCHAR(11),
    justificativaNovaColeta VARCHAR(1000),
	PRIMARY KEY (numeroExame),
    FOREIGN KEY (amostra) REFERENCES amostra(idAmostra),
    FOREIGN KEY (cpfAnalista) REFERENCES funcionario(cpf),
    FOREIGN KEY (cpfSupervisor) REFERENCES funcionario(cpf)
);