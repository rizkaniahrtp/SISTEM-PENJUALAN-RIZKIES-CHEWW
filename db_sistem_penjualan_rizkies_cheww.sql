-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2026 pada 15.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_penjualan_rizkies_cheww`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahans`
--

CREATE TABLE `bahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `nama_bahan` varchar(255) NOT NULL,
  `stok` decimal(10,2) NOT NULL,
  `satuan` enum('kg','gram','liter','pcs') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bahans`
--

INSERT INTO `bahans` (`id`, `supplier_id`, `nama_bahan`, `stok`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gula Pasir', 25.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(2, 1, 'Telur Ayam', 30.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(3, 1, 'Mentega', 10.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(4, 2, 'Tepung Terigu Protein Tinggi', 16.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(5, 2, 'Tepung Terigu Protein Sedang', 20.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(6, 2, 'Tepung Terigu Protein Rendah', 10.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(7, 3, 'Cokelat Bubuk', 8.50, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(8, 3, 'Dark Chocolate Compound', 12.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(9, 3, 'Choco Chips', 5.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(10, 4, 'Susu Cair', 40.00, 'liter', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(11, 4, 'Susu Bubuk', 18.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(12, 4, 'Keju Parut', 8.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(13, 5, 'Kopi Bubuk', 10.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(14, 5, 'Teh Celup', 130.00, 'pcs', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(15, 5, 'Sirup Vanilla', 8.00, 'liter', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(16, 6, 'Matcha Powder', 4.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(17, 6, 'Green Tea Powder', 4.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01'),
(18, 6, 'Bubuk Taro', 3.00, 'kg', '2026-01-08 11:36:01', '2026-01-08 11:36:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksis`
--

CREATE TABLE `detail_transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_satuan` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_transaksis`
--

INSERT INTO `detail_transaksis` (`id`, `transaksi_id`, `produk_id`, `jumlah`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 14000.00, 14000.00, '2026-01-08 13:45:36', '2026-01-08 13:45:36'),
(2, 1, 6, 1, 17000.00, 17000.00, '2026-01-08 13:45:36', '2026-01-08 13:45:36'),
(3, 2, 10, 1, 14000.00, 14000.00, '2026-01-08 14:03:21', '2026-01-08 14:03:21'),
(4, 2, 11, 1, 17000.00, 17000.00, '2026-01-08 14:03:21', '2026-01-08 14:03:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inboxes`
--

CREATE TABLE `inboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `status` enum('baru','dibaca','diproses','diarsipkan') NOT NULL DEFAULT 'baru',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inboxes`
--

INSERT INTO `inboxes` (`id`, `nama`, `email`, `pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anindia Arabella', 'anindia@gmail.com', 'saya tertarik untuk bekerja sama dengan rizkies cheww', 'diproses', '2026-01-08 14:45:43', '2026-01-08 14:52:25'),
(2, 'Aditya Febrian', 'adit@gmail.com', 'karyawannya pada ramah', 'dibaca', '2026-01-08 14:51:18', '2026-01-08 14:52:20'),
(3, 'Karina Nabila', 'nabila@gmail.com', 'website nya nyaman digunakan', 'baru', '2026-01-08 14:52:08', '2026-01-08 14:52:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'cookies', '2026-01-08 11:34:38', '2026-01-08 11:34:38'),
(2, 'donat', '2026-01-08 11:34:38', '2026-01-08 11:34:38'),
(3, 'minuman', '2026-01-08 11:34:38', '2026-01-08 11:34:38'),
(4, 'croissant', '2026-01-08 11:34:38', '2026-01-08 11:34:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_12_25_131132_create_users_table', 1),
(4, '2025_12_25_131905_create_kategoris_table', 1),
(5, '2025_12_25_132241_create_produks_table', 1),
(6, '2025_12_25_132939_create_suppliers_table', 1),
(7, '2025_12_25_135825_create_bahans_table', 1),
(8, '2025_12_25_142302_create_promosis_table', 1),
(9, '2025_12_25_142401_create_transaksis_table', 1),
(10, '2025_12_25_142834_create_detail_transaksis_table', 1),
(11, '2025_12_25_143605_create_pembayarans_table', 1),
(12, '2025_12_26_072047_create_testimonis_table', 1),
(13, '2025_12_29_020924_create_inboxes_table', 1),
(14, '2026_01_01_135922_create_keranjangs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayarans`
--

CREATE TABLE `pembayarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `metode` enum('transfer','qris','cash') DEFAULT NULL,
  `status` enum('menunggu','berhasil','gagal') NOT NULL DEFAULT 'menunggu',
  `tanggal_bayar` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayarans`
--

INSERT INTO `pembayarans` (`id`, `transaksi_id`, `metode`, `status`, `tanggal_bayar`, `created_at`, `updated_at`) VALUES
(1, 1, 'cash', 'berhasil', '2026-01-08 20:55:35', '2026-01-08 13:45:36', '2026-01-08 13:55:35'),
(2, 2, 'cash', 'menunggu', NULL, '2026-01-08 14:03:21', '2026-01-08 14:03:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `status` enum('tersedia','kosong') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `nama_produk`, `harga`, `stok`, `deskripsi`, `foto_produk`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Original Kies', 14000.00, 58, 'Cookies klasik dengan choco chips manis dan tekstur lembut-renyah.', 'original-kies.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 13:45:36'),
(2, 2, 'Donat Velvet Cheww', 13000.00, 70, 'Donat Red Velvet lembut dengan cita rasa kaya dan creamy.', '1766328815-velvet-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(3, 2, 'Donat Choco Cheww', 13000.00, 75, 'Donat empuk dilapisi cokelat manis lumer yang sangat lezat.', '1766328934-choco-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(4, 1, 'Dark Choco Kies', 14000.00, 70, 'Cookies Dark Choco renyah dengan rasa cokelat hitam yang kaya.', '1766391161-dark-choco-kies.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(5, 3, 'Hazelnut Latte', 17000.00, 80, 'Perpaduan espresso, susu creamy, dan aroma hazelnut yang harum menenangkan.', '1766391299-hazelnut-latte-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(6, 3, 'Iced Latte', 17000.00, 77, 'Kopi smooth dingin dengan susu creamy yang segar dan nikmat.', '1766391384-iced-latte-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 13:45:36'),
(7, 1, 'Kismis Kies', 12000.00, 75, 'Cookies kismis renyah dengan isian manis untuk camilan santai.', '1766391465-kismis-kies.jpg', 'tersedia', '2025-12-21 18:17:45', '2025-12-21 20:45:28'),
(8, 3, 'Latte', 16000.00, 80, 'Kopi susu creamy dengan rasa lembut yang seimbang dan ringan.', '1766391537-latte-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(9, 3, 'Lemon Tea', 12000.00, 118, 'Minuman teh segar dengan perpaduan lemon yang sangat menyegarkan.', '1766391603-lemon-tea-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(10, 1, 'Matcha Kies', 14000.00, 87, 'Cookies matcha renyah dengan aroma matcha autentik yang sangat harum.', '1766391658-matcha-kies.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 14:03:21'),
(11, 3, 'Matcha Latte', 17000.00, 88, 'Matcha pilihan dengan susu segar menghasilkan rasa autentik dan lembut.', '1766391724-matcha-latte-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 14:03:21'),
(12, 3, 'Milkshake Choco', 17000.00, 80, 'Milkshake cokelat berkualitas dengan tekstur creamy yang kaya rasa.', '1766391789-milkshake-choco-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(13, 2, 'Donat Minty Oreo', 15000.00, 96, 'Donat lembut dengan perpaduan rasa mint segar dan tekstur Oreo.', '1766391848-minty-oreo-cheww.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(14, 1, 'Tiramisu Kies', 14000.00, 79, 'Cookies rasa tiramisu kopi dengan sentuhan krim yang sangat elegan.', '1766391932-tiramisu-kies.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(15, 1, 'Red Velvet Kies', 15000.00, 98, 'Cookies Red Velvet bahan pilihan dengan cita rasa mewah lembut.', '1766392006-velvet-kies.jpg', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(16, 2, 'Donat Stroberi Cheww', 14000.00, 89, 'Donat empuk rasa stroberi manis segar dengan aroma buah menggoda.', '1766404280-stroberi-cheww.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(17, 1, 'Stroberi Kies', 15000.00, 88, 'Cookies stroberi renyah lembut dengan rasa manis segar dan aroma menggoda.', '1766404342-stroberi-kies.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(18, 2, 'Donat Taro', 14000.00, 86, 'Donat taro empuk manis lembut dengan aroma khas menggoda unik.', '1766404499-taro-cheww.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(19, 1, 'Lotus Biscoff Kies', 15000.00, 110, 'Cookies Lotus Biscoff renyah manis karamel dengan aroma khas menggoda.', '1766404544-lotus biscoff kies.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(20, 1, 'Cheese Kies', 15000.00, 75, 'Cookies Cheese gurih lembut creamy dengan rasa keju khas menggoda.', '1766404588-chesee kies.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(21, 1, 'Cinnamon Smores Kies', 14000.00, 87, 'Cookies Cinnamon Smores renyah manis hangat dengan cokelat lumer menggoda.', '1766404635-cinnamon smores kies.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(22, 4, 'Ori Croissant', 14000.00, 87, 'Croissant butter klasik yang renyah di luar dan lembut berlayer di dalam, dengan taburan gula halus tipis.', '1767194780-croissant-ori.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(23, 4, 'Stroberi Croissant', 14000.00, 80, 'Croissant dengan glaze stroberi segar berwarna merah muda, topping buah stroberi asli dan remahan stroberi kering.', '1767194900-croissant-stroberi.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(24, 4, 'Choco Croissant', 15000.00, 82, 'Croissant dengan siraman glaze coklat pekat, taburan bubuk kakao, dan serutan coklat premium.', '1767196486-croissant-choco.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57'),
(25, 4, 'Vanilla Fla Croissant', 15000.00, 82, 'Croissant dengan isian fla vanila yang sangat lembut, diberi topping crumble vanila yang renyah.', '1767196533-croissant-fla-vanila.png', 'tersedia', '2026-01-08 11:34:57', '2026-01-08 11:34:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promosis`
--

CREATE TABLE `promosis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_promo` varchar(255) NOT NULL,
  `nama_promosi` varchar(255) NOT NULL,
  `diskon` decimal(12,2) NOT NULL,
  `min_belanja` decimal(12,2) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `promosis`
--

INSERT INTO `promosis` (`id`, `kode_promo`, `nama_promosi`, `diskon`, `min_belanja`, `tanggal_mulai`, `tanggal_selesai`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AWALTAHUN26', 'Diskon Awal Tahun', 2000.00, 25000.00, '2026-01-01', '2026-01-15', 'aktif', '2026-01-08 11:36:25', '2026-01-08 11:36:25'),
(2, 'MERDEKA17', 'Diskon Kemerdekaan', 7000.00, 71000.00, '2026-08-15', '2026-08-19', 'nonaktif', '2026-01-08 11:36:25', '2026-01-08 11:36:25'),
(3, 'NATAL25', 'Diskon Hari Natal', 3000.00, 30000.00, '2025-12-24', '2025-12-27', 'nonaktif', '2026-01-08 11:36:25', '2026-01-08 14:26:52'),
(4, 'LEBARAN26', 'Diskon Hari Raya', 5000.00, 50000.00, '2025-03-25', '2025-03-30', 'nonaktif', '2026-01-08 11:36:25', '2026-01-08 11:36:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `nama_supplier`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Toko Sumber Pangan Nusantara', '0215550101', 'Jakarta Pusat', '2026-01-08 11:35:37', '2026-01-08 11:35:37'),
(2, 'Toko Tepung Sejahtera Abadi', '0247601122', 'Semarang, Jawa Tengah', '2026-01-08 11:35:37', '2026-01-08 11:35:37'),
(3, 'Toko Cokelat Manis Lestari', '0228603344', 'Bandung, Jawa Barat', '2026-01-08 11:35:37', '2026-01-08 11:35:37'),
(4, 'Toko Dairy Prima Indonesia', '0218899776', 'Jakarta Timur', '2026-01-08 11:35:37', '2026-01-08 11:35:37'),
(5, 'Toko Minuman Rasa Nusantara', '0267812345', 'Karawang, Jawa Barat', '2026-01-08 11:35:37', '2026-01-08 11:35:37'),
(6, 'Toko Teh Matcha Nusantara', '0217654321', 'Jakarta Selatan', '2026-01-08 11:35:37', '2026-01-08 11:35:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `pesan` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `status` enum('menunggu','disetujui','diarsipkan') NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `testimonis`
--

INSERT INTO `testimonis` (`id`, `user_id`, `produk_id`, `pesan`, `gambar`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Cookies nya enakk bangettt, diluarnya garing dalamnyaa soft dan chewyy><', '1767880872-original-kies.jpg', 5, 'disetujui', '2026-01-08 14:01:12', '2026-01-08 14:01:38'),
(2, 7, 10, 'demi apapun, ini enak banget. TOPINGNYA GA PELIT, dan emang kerasa banget matcha premiumnya', '1767881063-matcha-kies.jpg', 5, 'disetujui', '2026-01-08 14:04:23', '2026-01-08 14:07:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promosi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `metode_pengantaran` enum('diambil','diantar') NOT NULL,
  `detail_pengantaran` longtext DEFAULT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `potongan_harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `total_harga` decimal(12,2) NOT NULL,
  `status` enum('menunggu','diproses','selesai','dibatalkan') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `user_id`, `promosi_id`, `metode_pengantaran`, `detail_pengantaran`, `subtotal`, `potongan_harga`, `total_harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'diambil', NULL, 31000.00, 2000.00, 29000.00, 'selesai', '2026-01-08 13:45:36', '2026-01-08 13:55:24'),
(2, 7, 1, 'diantar', 'Kp. Jati, Desa Cihuni, Kec. Pasawahan', 31000.00, 2000.00, 29000.00, 'selesai', '2026-01-08 14:03:21', '2026-01-08 14:03:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `peran` enum('admin','pengunjung') NOT NULL DEFAULT 'pengunjung',
  `foto_profil` varchar(255) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama_user`, `email`, `no_hp`, `password`, `peran`, `foto_profil`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Rizkania Hartika Putri', 'rizka@gmail.com', '087870122846', '$2y$12$./IDu0sWA.JUMDtEjZ5eGuTEYlUsXAKUfJ6VOyrANeIyqRSpluK5G', 'admin', 'rizka.jpg', 'Pasawahan, Purwakarta', NULL, NULL),
(2, 'Julaika Safta Rini', 'jule@gmail.com', '083132484576', '$2y$12$G2CKQv162KgQEu8k/ukJ/Ofc.m9F975Z0mtqVKcN2k3YY6nKrBkrq', 'pengunjung', 'jule.jpg', 'Cihuni, Purwakarta', NULL, NULL),
(3, 'Angga Jaya', 'angga_jaya@gmail.com', '083811223344', '$2y$12$j4SBO5LRcDb56mdOD1Z2z.EAWdeMla3y.9uKXlh/TyCpnyDmeGeaK', 'pengunjung', 'angga_jaya.jpg', 'Munjul Jaya, Purwakarta', NULL, NULL),
(4, 'Roronoa Zoro', 'zoro@gmail.com', '087810293847', '$2y$12$23uQ5B3z4AqQOnHYVbKGU.ild45t/1RjYSrzcN9tPTCAV4KhEnQi.', 'pengunjung', 'roronoa-zoro.jpg', 'Tokyo, Jepang', NULL, NULL),
(5, 'Vinsmoke Sanji', 'sanji@gmail.com', '083811223344', '$2y$12$rZpXD3CguXYED2w.FvbELe0Epvm7.2Ypqfpq5sEccJGrIkRbxN4ZK', 'pengunjung', 'vinsmoke-sanji.jpg', 'Gg. Rusa, Sindangkasih', NULL, NULL),
(6, 'Nami', 'nami@gmail.com', '087870112233', '$2y$12$8./0RuuEtU6akJpQ5aPBpev8jVfNicvo9X1HiNkjZG9nyIBhvEI8S', 'pengunjung', 'nami.jpg', 'Kp. Jati, Pasawahan', NULL, NULL),
(7, 'Monkey D Luffy', 'luffy@gmail.com', '083185892567', '$2y$12$WDaDkQWTfO0/Ao7FXFF8zu/Skrw7OYLP/vT2EF3d7ibWaj4rQy59q', 'pengunjung', 'mokey-luffy.jpg', 'Cidahu, Purwakarta', NULL, NULL),
(8, 'Nico Robin', 'robin@gmail.com', '08319634864', '$2y$12$.nrvsepqVbWVThfT9vG8w.0JMcEw3DffavhAMRnqL7uc6CN6V04VS', 'pengunjung', 'nico-robin.jpg', 'Kota Baru, Karawang', NULL, NULL),
(9, 'Mark Lee', 'mark@gmail.com', '089676003743', '$2y$12$45Q34jMnDq0pOZIG5TY1BeI5N5YUoOo/vH9r0XxIU5fevbn4v5BZ6', 'admin', 'mark_dotdonat.jpg', 'Campaka, Purwakarta', NULL, NULL),
(10, 'Carmen Nita', 'carmen@gmail.com', '087779102746', '$2y$12$p6SJlva.0bzX31xWCQRwMePwaCXZYI/y2Iko2pzHT4DUqHW7SMDxi', 'pengunjung', 'carmen_drink.jpg', 'Denpasar, Bali', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahans`
--
ALTER TABLE `bahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bahans_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_transaksis_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `detail_transaksis_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`),
  ADD KEY `keranjangs_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayarans_transaksi_id_foreign` (`transaksi_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `promosis`
--
ALTER TABLE `promosis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promosis_kode_promo_unique` (`kode_promo`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonis_user_id_foreign` (`user_id`),
  ADD KEY `testimonis_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_user_id_foreign` (`user_id`),
  ADD KEY `transaksis_promosi_id_foreign` (`promosi_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahans`
--
ALTER TABLE `bahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `promosis`
--
ALTER TABLE `promosis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahans`
--
ALTER TABLE `bahans`
  ADD CONSTRAINT `bahans_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksis`
--
ALTER TABLE `detail_transaksis`
  ADD CONSTRAINT `detail_transaksis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_transaksis_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayarans`
--
ALTER TABLE `pembayarans`
  ADD CONSTRAINT `pembayarans_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimonis`
--
ALTER TABLE `testimonis`
  ADD CONSTRAINT `testimonis_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_promosi_id_foreign` FOREIGN KEY (`promosi_id`) REFERENCES `promosis` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
