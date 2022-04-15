
-- Funcionarios
INSERT INTO funcionario (cpf, nome, passwordHash, tipoFuncionario) 
VALUES ('12345678900', 'José', '12345678', 'ENFERMEIRO');
INSERT INTO funcionario (cpf, nome, passwordHash, tipoFuncionario) 
VALUES ('12345678901', 'Maria', '12345678', 'ANALISTA_CLINICO');
INSERT INTO funcionario (cpf, nome, passwordHash, tipoFuncionario) 
VALUES ('12345678902', 'João', '12345678', 'SUPERVISOR');

-- Auth
INSERT INTO auth (cpfFuncionario, token)
VALUES ('12345678900','000000000');
INSERT INTO auth (cpfFuncionario, token)
VALUES ('12345678901','000000001');
INSERT INTO auth (cpfFuncionario, token)
VALUES ('12345678902','000000002');

-- Amostras
INSERT INTO amostra (idAmostra, tipoAmostra, dataColeta, cpfResponsavel) 
VALUES (1, 'SANGUE', '2022-04-15 01:50:17.879703','12345678900');
INSERT INTO amostra (idAmostra, tipoAmostra, dataColeta, cpfResponsavel) 
VALUES (2, 'MUCOSA', '2022-04-15 01:50:17.879703','12345678900');
INSERT INTO amostra (idAmostra, tipoAmostra, dataColeta, cpfResponsavel) 
VALUES (3, 'CABELO', '2022-04-15 01:50:17.879703','12345678900');

-- exames
INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta)
VALUES (1, 'AGUARDANDO COLETA', null, null, null, null, null);
INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta)
VALUES (2, 'EM ANALISE', null,1,null,null,null);
INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta)
VALUES (3, 'AGUARDANDO LAUDO', '{"resultado": [{"componente": "hemacias", "valor referencial": {"masc": "5 - 0.5", "fem": "4.3 - 0.5"}, "resultadoPaciente": "4"}, {"componente": "hemoglobina", "valor referencial": {"masc": "15 - 2", "fem": "13.5 - 1.5"}, "resultadoPaciente": "6"}, {"componente": "plaquetas", "valor referencial": {"masc": "150 - 400", "fem": "150 - 400"}, "resultadoPaciente": "144"}]}', 1, 12345678900, null, null);
INSERT INTO exame (numeroExame,status,resultado,amostra,cpfAnalista,cpfSupervisor,justificativaNovaColeta)
VALUES (4, 'LIBERADO', '{"resultado": [{"componente": "hemacias", "valor referencial": {"masc": "5 - 0.5", "fem": "4.3 - 0.5"}, "resultadoPaciente": "4"}, {"componente": "hemoglobina", "valor referencial": {"masc": "15 - 2", "fem": "13.5 - 1.5"}, "resultadoPaciente": "6"}, {"componente": "plaquetas", "valor referencial": {"masc": "150 - 400", "fem": "150 - 400"}, "resultadoPaciente": "144"}]}', 1, 12345678900, 12345678902, null);
