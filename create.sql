CREATE Table produtos (
    id int NOT null auto_increment,
    id_fornecedor int not null,
    nome TEXT VARCHAR(255) not null,
    categoria TEXT not null DEFAULT 0,
    valor decimal not null DEFAULT 0,
    peso decimal not null DEFAULT 0,
    validade timestamp not null default current_timestamp(),

    PRIMARY key(id),
    Foreign Key (id_fornecedor) REFERENCES fornecedores(id)
)