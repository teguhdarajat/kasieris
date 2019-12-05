create database gaktubesgakwisuda;
use gaktubesgakwisuda;
create table barang (
	idbarang varchar(25) not null PRIMARY KEY,
	nama_barang varchar(45) not null,
	harga int not null,
	stok int not null,
	penginput varchar(25) not null,
	supplier varchar(25) not null
);

create table supplier (
	idbsupplier varchar(25) not null PRIMARY KEY,
	nama_supplier varchar(45) not null,
	alamat text not null,
	no_tlp varchar(15) not null,
	email varchar(50) not null,
	penginput varchar(25) not null
);

create table admin (
	id_admin varchar(25) not null PRIMARY KEY,
	nama_admin varchar(45) not null,
	gambar longblob not null,
	password varchar(50) not null
);

create table kasir (
	id_kasir varchar(25) not null PRIMARY KEY,
	nama_kasir varchar(50) not null,
	gambar longblob not null,
	stok int not null,
	shift_kerja varchar(10) not null,
	password varchar(50) not null,
	penginput varchar(25) not null
);

create table pembelian (
	id_pembelian varchar(25) not null PRIMARY KEY,
	id_barang varchar(25) not null,
	id_kasir varchar(25) not null,
	id_pembeli varchar(25) not null
);

create table pembeli (
	id_pembeli varchar(25) not null,
	tgl_kunjungan date not null
);
