Data Description

[General]
Dataset yang disediakan merupakan data lokasi kantor divre dan cabang BPJS, serta lokasi fasilitas kesehatan
(e.g. Puskesmas, RS, poliklinik, lab, etc.) yang sudah tercover oleh program BPJS. Data tersedia dalam format *.csv.

[Data Divisi Regional]
file: BPJS.divre.list.csv
Merupakan data Pembagian DivRe dan cakupan provinsi-nya di Indonesia.

Deskripsi Field:
DIVRE		=  ID Divre
COVERAGE	=  Coverage Divre dalam lingkup Provinsi di Indonesia

[Data Cabang]
file: BPJS.branch.list.csv
Merupakan data Pembagian Cabang BPJS dan cakupan Kabupaten/Kota-nya di Indonesia.

Deskripsi Field:
DIVRE	    = ID Divre
BRANCH		= Nama Cabang
COVERAGE    = Coverage Cabang dalam lingkup Kabupaten/Kota di Indonesia

[Data Alamat Kantor]
file: BPJS.office.divre.all
Merupakan data alamat kantor Divre dan Cabang BPJS

Deskripsi Field:
OfficeType  = Tipe Kantor (divre, cabang)	
Branch		= Nama Cabang
Address		= Alamat kantor
City		= Kota
ZIP			= Kode pos
Phone		= Nomer telpon
Fax			= Fax
Hotline		= Hotline

[Data Tipe Fasilitas Kesehatan] 
file: BPJS.faskes.type.csv
Merupakan data tipe/jenis fasilitas kesehatan yang masuk dalam cakupan BPJS

Deskripsi Field:
Tipe_Faskes	= Tipe faskes (tingkat pertama, lanjut, penunjang)
ID			= Kode
Jenis		= Jenis Faskes


[Data Alamat Fasilitas Kesehatan] 
file: BPJS.faskes.divre.[1..12].csv
Merupakan data alamat dari fasilitas kesehatan dari seluruh DIVRE (1..12) dan cabang yang dicover oleh program BPJS
(e.g. Puskesmas, RS, RSUD, RSTNI, Lab, Apotek, dsb),

Deskripsi Field:
Branch				= Cabang BPJS
Kabupaten			= Kabupaten
Type				= Tipe Faskes
Name				= Nama Faskes
Address				= Alamat Faskes
Telephone			= Telephone Faskes
Class				= Kelas Faskes
Kecamatan			= Kecamatan
Lat					= Latitude
Long				= Longitude


[Data Alamat Fasilitas Kesehatan] 
file: BPJS.faskes.branch.bandung.geolocated.csv
Merupakan data alamat fasilitas kesehatan untuk daerah coverage BPJS Cabang Bandung yang sudah di-geolocated 
(terdapat kordinat lokasi - latitude dan longitude)

Deskripsi Field:
Branch				= Cabang BPJS
Kabupaten			= Kabupaten
Type				= Tipe Faskes
Name				= Nama Faskes
Address				= Alamat Faskes
Telephone			= Telephone Faskes
Class				= Kelas Faskes
Kecamatan			= Kecamatan
Lat					= Latitude
Long				= Longitude