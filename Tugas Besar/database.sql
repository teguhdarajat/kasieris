create database gaktubesgakwisuda;
use gaktubesgakwisuda;
create table barang {
	idbarang varchar(25) not null primary key,
	nama_barang varchar(45) not null,
	harga int(8) not null,
	stok int(30) not null
	};

create table pegawai {
	id_pegawai varchar(25) not null primary key,
	nama_pegawai varchar(50) not null,
	foto longbloob not null,
	shift_kerja varchar(10) not null,
	password varchar(50) not null
	};
create table pembeli{
	idpembeli varchar(25) not null primary key,
	nama varchar(50) not null,
	membership tinyint(1) not null,
	tgl_daftar date not null
	};
create table supplier {
	idsupplier varchar(25) not null primary key,
	nama_supplier varchar(50) not null,
	alamat text not null,
	no_tlp varchar(15) not null,
	email varchar(50) not null
	};