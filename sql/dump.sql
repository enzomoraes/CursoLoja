CREATE TABLE usuarios (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  login varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  senha varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS alunos;
CREATE TABLE alunos (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  sobrenome varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  telefone varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  endereco varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  cpf varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  sexo char(1) COLLATE utf8_unicode_ci NOT NULL CHECK (`sexo` in ('M','F')),
  dataNascimento date NOT NULL,
  indicacao varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS cursos;
CREATE TABLE cursos (
  id int(11) NOT NULL AUTO_INCREMENT,
  culinarista varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  data date NOT NULL,
  descricao varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  particular tinyint(1) DEFAULT 0,
  preco decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS aluno_curso;
CREATE TABLE aluno_curso (
  id int(11) NOT NULL AUTO_INCREMENT,
  id_aluno int(11) NOT NULL,
  id_curso int(11) NOT NULL,
  UNIQUE(id_aluno, id_curso),
  PRIMARY KEY (id),
  FOREIGN KEY fk_aluno (id_aluno) REFERENCES alunos(id) ON DELETE CASCADE,
  FOREIGN KEY fk_curso (id_curso) REFERENCES cursos(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
