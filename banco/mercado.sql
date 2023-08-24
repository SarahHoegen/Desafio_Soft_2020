CREATE TABLE IF NOT EXISTS "pedido" (
	"cod_ped" SERIAL NOT NULL,
	"preco_total" REAL NULL DEFAULT NULL,
	"preco_imposto" REAL NULL DEFAULT NULL,
	PRIMARY KEY ("cod_ped")
);

CREATE TABLE IF NOT EXISTS "tipo_produto" (
	"nome_tipo" VARCHAR(50) NULL DEFAULT NULL,
	"cod_tipo" VARCHAR(10) NOT NULL,
	"imposto" REAL NULL DEFAULT NULL,
	"excluido" INTEGER NOT NULL DEFAULT 0,
	PRIMARY KEY ("cod_tipo")
);

CREATE TABLE IF NOT EXISTS "produto" (
	"cod_prod" SERIAL NOT NULL,
	"nome" VARCHAR(50) NULL DEFAULT NULL,
	"tipo_unid" VARCHAR(10) NULL DEFAULT NULL,
	"fk_cod_tipo" VARCHAR(10) NULL DEFAULT NULL,
	"preco" REAL NULL DEFAULT NULL,
	"excluido" INTEGER NOT NULL DEFAULT 0,
	PRIMARY KEY ("cod_prod"),
	CONSTRAINT "produto_cod_tipo_fkey" FOREIGN KEY ("fk_cod_tipo") REFERENCES "tipo_produto" ("cod_tipo") ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE IF NOT EXISTS "lista" (
	"fk_cod_ped" INTEGER NOT NULL,
	"fk_cod_prod" INTEGER NOT NULL,
	"imposto" REAL NULL DEFAULT NULL,
	"qtd" INTEGER NULL DEFAULT NULL,
	"preco" REAL NULL DEFAULT NULL,
	PRIMARY KEY ("fk_cod_ped", "fk_cod_prod"),
	CONSTRAINT "fk_cod_ped" FOREIGN KEY ("fk_cod_ped") REFERENCES "pedido" ("cod_ped") ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT "fk_cod_prod" FOREIGN KEY ("fk_cod_prod") REFERENCES "produto" ("cod_prod") ON UPDATE NO ACTION ON DELETE NO ACTION
);