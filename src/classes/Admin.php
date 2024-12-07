<?php
class Admin extends User
{

    public function sidebar()
    {
        // Get the current page filename
        $currentPage = basename($_SERVER['PHP_SELF']);

        return
            <<<HTML
            <div class="flex items-center mb-8">
                <img src="../src/img/logoBlack.svg" alt="Logo Prespol" class="w-40">
            </div>
            <nav class="space-y-4 gap-4 flex flex-col h-full">
            <ul class="space-y-2">
            <!-- sidebar admin -->
            <li>
                    <a href="home.php" class="flex items-center py-2 px-8 {$this->getActiveClass($currentPage, 'home.php')} hover:bg-orange-400 hover:text-white rounded-lg transition duration-200">
                        <i class="fas fa-home"></i>
                        <span class="ml-4">Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="profil.php" class="flex items-center py-2 px-8 {$this->getActiveClass($currentPage, 'profile.php')} hover:bg-orange-400 hover:text-white rounded-lg transition duration-200">
                        <i class="fas fa-user"></i>
                        <span class="ml-5">Profil</span>
                    </a>
                </li>
                <li>
                    <a href="inputPrestasi.php" class="flex items-center py-2 px-8 {$this->getActiveClass($currentPage, 'inputPrestasi.php')} hover:bg-orange-400 hover:text-white rounded-lg transition duration-200">
                        <i class="fas fa-trophy"></i>
                        <span class="ml-4">Tambah prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="daftarPengajuan.php" class="flex items-center py-2 px-8 {$this->getActiveClass($currentPage, 'daftarPengajuan.php')} hover:bg-orange-400 hover:text-white rounded-lg transition duration-200">
                        <i class="fas fa-file-alt"></i>
                        <span class="ml-6">Validasi</span>
                    </a>
                </li>
                <li>
                    <a href="daftarPrestasi.php" class="flex items-center py-2 px-8 {$this->getActiveClass($currentPage, 'daftarPrestasi.php')} hover:bg-orange-400 hover:text-white rounded-lg transition duration-200">
                        <i class="fas fa-list"></i>
                        <span class="ml-5">List Prestasi</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="openModal('logoutModal')" class="flex items-center py-2 px-8 hover:bg-orange-400 hover:text-white rounded-lg transition duration-200">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="ml-4">Keluar</span>
                    </a>
                </li>
            </ul>
            </nav>
    
            <!-- Logout Modal HTML -->
            <div id="logoutModal" class="fixed inset-0 z-[9999] hidden bg-black bg-opacity-50 overflow-y-auto h-full w-full px-4" style="backdrop-filter: blur(5px);">
            <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white max-w-md">
                <div class="flex justify-end p-2">
                    <button onclick="closeModal('logoutModal')" type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="p-6 pt-0 text-center">
                    <svg class="w-20 h-20 text-orange-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Kamu yakin mau keluar?</h3>
                    <a href="logout.php" 
                        class="text-white bg-orange-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
                        Ya, Keluar
                    </a>
                    <a href="#" onclick="closeModal('logoutModal')"
                        class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center">
                        Batal
                    </a>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            window.openModal = function(modalId) {
                document.getElementById(modalId).style.display = 'block';
                document.body.style.overflow = 'hidden';
            }

            window.closeModal = function(modalId) {
                document.getElementById(modalId).style.display = 'none';
                document.body.style.overflow = 'auto';
            }

            // Close all modals when press ESC
            document.onkeydown = function(event) {
                event = event || window.event;
                if (event.keyCode === 27) {
                    document.body.style.overflow = 'auto';
                    let modals = document.getElementsByClassName('modal');
                    Array.prototype.slice.call(modals).forEach(i => {
                        i.style.display = 'none';
                    });
                }
            };
        </script>
    HTML;
    }

    // Helper method to determine active class
    private function getActiveClass($currentPage, $pageName)
    {
        return $currentPage === $pageName
            ? 'bg-orange-500 text-white'
            : 'text-gray-700';
    }

    public function mainContent($username)
    {
        $this->profile($username);
        echo
        <<<HTML
                    <header class="flex flex-col lg:flex-row justify-between items-center mb-8">
                        <div class="text-center lg:text-left">
                            <h1 class="text-3xl font-bold">Selamat Datang</h1>
                            <h2 class="text-5xl font-bold text-black">Admin!</h2>
                            <button onclick="window.location.href='daftarPengajuan.php'" class="mt-4 bg-black text-white py-2 px-6 rounded hover:bg-gray-800">
                                Validasi Prestasi
                            </button>
                        </div>
                    </header>
                HTML;
    }

    public function profile($username){
        try{       
            $sql = "SELECT 
                nama,
                foto_profile
            FROM pegawai
            WHERE no_induk = ?";
            $params = [$username];

            $row = $this->db->fetchOne($sql, $params);
            if ($row) {
                $nama = $row['nama'] ?? 'Unknown';
                $fotoProfile = $row['foto_profile'] ?? 'default-profile.png';
                echo
                <<<HTML
                        <div class="flex justify-between items-center p-4" style="margin: 0; background: none;">
                            <div class="flex items-center ml-auto"> <!-- Added ml-auto to push this div to the right -->
                                <h3 class="text-xl">  $nama</h3>
                                <img src="{$fotoProfile}" alt="Profile Picture" class="w-10 h-10 rounded-full ml-2">
                            </div>
                        </div>
                HTML;
            } else {
                throw new Exception('Data tidak ditemukan untuk username: ' . htmlspecialchars($username));
            }
        } catch (Exception $e) {
            // Log kesalahan dan lempar ulang
            error_log($e->getMessage());
            echo 'Akun tidak ditemukan';
        }
    }

    public function getPrestasiPendingList($page = 1, $limit = 10)
    {
        // Calculate offset
        $offset = ($page - 1) * $limit;
    
        // Query to get paginated data from VIEW
        $query = "SELECT id_pending, nama_mahasiswa, nama_kompetisi, nama_kategori, jenis_juara 
            FROM vw_PrestasiPending
            WHERE status_validasi <> 'tolak'
            ORDER BY id_pending
            OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
    
        // Parameters for query
        $params = [$offset, $limit];
    
        // Execute query
        $result = $this->db->fetchAll($query, $params);
    
        if ($result === false) {
            throw new Exception('Gagal mengambil data prestasi pending: ' . print_r(sqlsrv_errors(), true));
        }
    
        // Get total count for pagination
        $countQuery = "SELECT COUNT(*) as total 
            FROM vw_PrestasiPending 
            WHERE status_validasi <> 'tolak'";
        $countResult = $this->db->fetchOne($countQuery);
        $totalItems = $countResult['total'];
        $totalPages = ceil($totalItems / $limit);
    
        return [
            'data' => $result,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }
    
    public function getPrestasiVerifiedList($no_induk, $page = 1, $limit = 10)
    {
        // Calculate offset
        $offset = ($page - 1) * $limit;
    
        $query = "SELECT status_validasi, nama_mahasiswa, nama_kompetisi, nama_kategori, jenis_juara 
            FROM vw_daftar_pengajuan_terlayani
            WHERE no_induk_pegawai = ?
            ORDER BY id_validasi
            OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
        
        $params = [$no_induk, $offset, $limit];
        
        $result = $this->db->fetchAll($query, $params);
    
        if ($result === false) {
            throw new Exception('Gagal mengambil data prestasi pending: ' . print_r(sqlsrv_errors(), true));
        }
    
        // Get total count for pagination
        $countQuery = "SELECT COUNT(*) as total 
            FROM vw_daftar_pengajuan_terlayani 
            WHERE no_induk_pegawai = ?";
        $countParams = [$no_induk];
        $countResult = $this->db->fetchOne($countQuery, $countParams);
        $totalItems = $countResult['total'];
        $totalPages = ceil($totalItems / $limit);
    
        return [
            'data' => $result,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }


    public function getPrestasiPendingDetail($id_pending)
    {
        // Query untuk mendapatkan data detail dari VIEW
        $query = "
            SELECT * 
            FROM vw_PrestasiPending 
            WHERE id_pending = ?
        ";

        $params = [$id_pending];
        return $this->db->fetchOne($query, $params);
    }


    public function validatePrestasi($id_pending, $status, $deskripsi, $no_induk) {
        try {
            // mengambil path kelima file dari tabel prestasi_pending
            $queryFetchFiles = "SELECT foto_kompetisi, flyer, sertifikat, surat_tugas, karya_kompetisi 
                                FROM prestasi_pending WHERE id_pending = ?";
            $filesResult = $this->db->fetchOne($queryFetchFiles, [$id_pending]);

            if (!$filesResult) {
                throw new Exception("Data dengan ID tersebut tidak ditemukan.");
            }
            //mengambil id_pegawai
            $sql = 'SELECT id_pegawai FROM pegawai WHERE no_induk = ?';
            $stmt = $this->db->fetchOne($sql, [$no_induk]);
            $id_pegawai = $stmt['id_pegawai'];

            // Panggil prosedur untuk memindahkan atau memperbarui data
            $queryMove = "EXEC sp_ValidatePrestasi @id_pending = ?, @status_validasi = ?, @deskripsi = ?, @id_pegawai = ?";
            $params = [$id_pending, $status, $deskripsi, $id_pegawai];
    
            // Jalankan prosedur
            $this->db->executeProcedure($queryMove, $params);
            
            // Jika status 'tolak', hapus semua file yang terkait
            if ($status === 'tolak') {
                $filePaths = [
                    $filesResult['foto_kompetisi'],
                    $filesResult['flyer'],
                    $filesResult['sertifikat'],
                    $filesResult['surat_tugas'],
                    $filesResult['karya_kompetisi']
                ];

                $deletedFiles = [];
                foreach ($filePaths as $filePath) {
                    if (!empty($filePath) && file_exists($filePath)) {
                        if (unlink($filePath)) {
                            $deletedFiles[] = basename($filePath); // Simpan nama file yang berhasil dihapus
                        } else {
                            throw new Exception("Gagal menghapus file: " . basename($filePath));
                        }
                    }
                }

                // Berikan konfirmasi penghapusan
                return "Prestasi ditolak. File yang dihapus: " . implode(", ", $deletedFiles);
            }

            // Periksa hasil dan kembalikan pesan sesuai status
            return "Validasi berhasil dilakukan dan data dipindahkan ke tabel prestasi.";
        } catch (Exception $e) {
            // Tangani kesalahan
            throw new Exception("Kesalahan validasi: " . $e->getMessage());
        }
    }

    public function listPrestasi($search = '', $filterKategori = '', $filterJuara = '', $filterJurusan = '', $sort = 'newest')
    {
        $page = isset($_POST['page']) ? (int)$_POST['page'] : 1; // Change from $_GET to $_POST
        $limit = 10;
        $offset = ($page - 1) * $limit;

        $totalQuery = "SELECT COUNT(*) AS total FROM vw_daftar_prestasi WHERE 1=1";
        $params = [];

        // Filter conditions (keep existing code)
        if (!empty($search)) {
            $totalQuery .= " AND (
                [nama mahasiswa] LIKE ? OR 
                nama_kompetisi LIKE ? OR 
                event LIKE ?
            )";
            $params[] = '%' . $search . '%';
            $params[] = '%' . $search . '%';
            $params[] = '%' . $search . '%';
        }

        if (!empty($filterKategori)) {
            $totalQuery .= " AND kategori = ?";
            $params[] = $filterKategori;
        }
        if (!empty($filterJuara)) {
            $totalQuery .= " AND juara = ?";
            $params[] = $filterJuara;
        }
        if (!empty($filterJurusan)) {
            $totalQuery .= " AND jurusan = ?";
            $params[] = $filterJurusan;
        }

        $totalRow = $this->db->fetchOne($totalQuery, $params);
        $totalData = $totalRow['total'];
        $totalPages = ceil($totalData / $limit);

        // Query data (keep existing query structure)
        $query = "SELECT 
                    id_prestasi,
                    [nama mahasiswa] AS nama,
                    jurusan,
                    nama_kompetisi,
                    event,
                    juara,
                    kategori,
                    tahun
                  FROM vw_daftar_prestasi 
                  WHERE 1=1";

        // Add filter conditions to the main query (similar to total query)
        if (!empty($search)) {
            $query .= " AND (
                [nama mahasiswa] LIKE ? OR 
                nama_kompetisi LIKE ? OR 
                event LIKE ?
            )";
        }

        if (!empty($filterKategori)) {
            $query .= " AND kategori = ?";
        }
        if (!empty($filterJuara)) {
            $query .= " AND juara = ?";
        }
        if (!empty($filterJurusan)) {
            $query .= " AND jurusan = ?";
        }

        // Sorting (keep existing sorting logic)
        switch ($sort) {
            case 'newest':
                $query .= " ORDER BY created_date DESC";
                break;
            case 'oldest':
                $query .= " ORDER BY created_date ASC";
                break;
            case 'A-Z':
                $query .= " ORDER BY nama ASC";
                break;
            case 'Z-A':
                $query .= " ORDER BY nama DESC";
                break;
        }

        $query .= " OFFSET ? ROWS FETCH NEXT ? ROWS ONLY";
        $params[] = $offset;
        $params[] = $limit;

        $result = $this->db->fetchAll($query, $params);

        $rows = '';
        if ($result) {
            foreach ($result as $index => $row) {
                $rows .= '<tr>';
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($index + 1 + $offset) . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['nama'] ?? '') . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['jurusan'] ?? '') . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['nama_kompetisi'] ?? '') . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['event'] ?? '') . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['juara'] ?? '') . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['kategori'] ?? '') . "</td>";
                $rows .= "<td class='py-3 px-6 border'>" . htmlspecialchars($row['tahun'] ?? '') . "</td>";
        
                // URL untuk tombol Detail dan Hapus
                $detailUrl = "detailPrestasi.php?id_prestasi=" . urlencode($row['id_prestasi']);
        
                // Tambahkan tombol Detail dan Hapus
                $rows .= "<td class='py-3 px-6 border text-center'>
                            <div class='flex justify-center space-x-2'>
                                <a href='" . htmlspecialchars($detailUrl) . "'>
                                    <button class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700'>
                                        Detail
                                    </button>
                                </a>
                                 <button 
                                    class='bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700 delete-button' 
                                    data-id='" . htmlspecialchars($row['id_prestasi']) . "'>
                                    Hapus
                                </button>
                            </div>
                          </td>";
                $rows .= '</tr>';
            }
        } else {
            $rows = '<tr><td colspan="9" class="text-center">Tidak ada data ditemukan</td></tr>';
        }
        return json_encode([
            'rows' => $rows,
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $totalPages,
                'total_data' => $totalData
            ]
        ]);
    }


    public function getPrestasiDetail($id_prestasi)
    {
        // Query untuk mendapatkan data detail dari VIEW
        $query = "
            SELECT * 
            FROM vw_daftar_prestasi 
            WHERE id_prestasi = ?
        ";

        $params = [$id_prestasi];
        return $this->db->fetchOne($query, $params);
    }

    public function profilDetail($no_induk) {
        try {
            $sql = "SELECT 
                p.no_induk,
                p.nama,
                p.foto_profile
            FROM pegawai p
            WHERE p.no_induk = ?";
            $params = [ $no_induk];

            // Ambil hasil query
            $row = $this->db->fetchOne( $sql, $params );
            if ( $row ) {
                $nama = $row[ 'nama' ] ?? 'Unknown';
                $fotoProfile = $row[ 'foto_profile' ] ?? 'default-profile.png';
                echo
                <<<HTML
                    <div class = 'flex items-center mb-8'>
                        <img alt = 'User profile picture' class = 'space-y-8 rounded-full mr-4' height = '100' src = '$fotoProfile' width = '100'/>
                        <div class="space-y-2">
                            <h1 class = 'text-3xl font-bold'> $nama </h1>
                            <div class = 'flex items-center'>
                            <!-- <span class = 'bg-orange-200 text-orange-600 px-2 py-1 rounded-full text-sm'> $no_induk </span> -->
                            <span class = 'text-xl bg-orange-400 text-white py-2 px-6 rounded'> NIM $no_induk </span>
                        </div>
                    </div>
                    <img src = "img/setting.svg" alt = 'Profile Picture' class = 'w-10 h-10 rounded-full ml-2'>
                HTML;

            } else {
                throw new Exception( 'Data tidak ditemukan untuk username: ' . htmlspecialchars( $no_induk ) );
            }
        } catch ( Exception $e ) {
            // Log kesalahan dan lempar ulang
            error_log( $e->getMessage() );
            echo 'Akun tidak ditemukan';
        }
    }

    public function softDelete($id_prestasi, $deskripsi) {
        $queryFetchPath = 'SELECT foto_kompetisi, sertifikat, flyer, karya_kompetisi, surat_tugas FROM prestasi WHERE id_prestasi = ?';
        $row = $this->db->fetchOne($queryFetchPath, [$id_prestasi]);
    
        $mapDirectories = [
            'foto_kompetisi' => 'archive/kompetisi/',
            'karya_kompetisi' => 'archive/karya/',
            'flyer' => 'archive/flyer/',
            'sertifikat' => 'archive/sertifikat/',
            'surat_tugas' => 'archive/surat-tugas/'
        ];
    
        $newPaths = []; // Array untuk menyimpan path baru
        $rollbackPaths = []; // Array untuk menyimpan rollback file
    
        try {
            // Loop untuk memindahkan file
            foreach ($row as $column => $filePath) {
                if (!empty($filePath)) {
                    $fileName = basename($filePath);
                    $destinationDir = $mapDirectories[$column] ?? '';
    
                    if (!empty($destinationDir)) {
                        if (!is_dir($destinationDir)) {
                            mkdir($destinationDir, 0777, true);
                        }
    
                        $destinationPath = $destinationDir . $fileName;
    
                        if (file_exists($filePath)) {
                            if (rename($filePath, $destinationPath)) {
                                $newPaths[$column] = $destinationPath; // Simpan path baru
                                $rollbackPaths[$column] = $filePath; // Simpan path asli untuk rollback
                            } else {
                                throw new Exception("Gagal memindahkan file $filePath ke $destinationPath");
                            }
                        } else {
                            throw new Exception("File $filePath tidak ditemukan");
                        }
                    }
                }
            }
    
            // Eksekusi prosedur hanya jika semua file berhasil dipindahkan
            $querySoftDelete = 'EXEC sp_SoftDeletePrestasi 
                @id_prestasi = ?,
                @foto_kompetisi = ?,
                @sertifikat  = ?,
                @flyer  = ?,
                @karya_kompetisi  = ?,
                @surat_tugas  = ?,
                @deskripsi  = ?';
    
            $params = [
                $id_prestasi,
                $newPaths['foto_kompetisi'] ?? null,
                $newPaths['sertifikat'] ?? null,
                $newPaths['flyer'] ?? null,
                $newPaths['karya_kompetisi'] ?? null,
                $newPaths['surat_tugas'] ?? null,
                $deskripsi
            ];
            $result = $this->db->executeProcedure($querySoftDelete, $params);
    
            return $result;
        } catch (Exception $e) {
            // Rollback file yang sudah berhasil dipindahkan
            foreach ($rollbackPaths as $column => $originalPath) {
                if (isset($newPaths[$column]) && file_exists($newPaths[$column])) {
                    rename($newPaths[$column], $originalPath); // Kembalikan file ke lokasi semula
                }
            }
            // Lempar ulang exception agar bisa ditangani di luar
            throw $e;
        }
    }
    

    public function closeConnection()
    {
        $this->db->close();
    }
}
