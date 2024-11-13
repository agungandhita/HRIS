<?php 

namespace App\Repositories\Manajer;

use Exception;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ManajerRepository implements ManajerInterface
{
    private $userModel;

    public function __construct(User $user)
    {
        $this->userModel = $user;
    }

    /**
     * Menyimpan data manajer baru.
     * 
     * @param array $data
     * @return \App\Models\User
     */
    public function store(array $data)
    {
        // Enkripsi password sebelum menyimpan
        $data['password'] = bcrypt($data['password']);
        
        // Simpan data manajer
        return $this->userModel->create($data);
    }

    public function update(int $id, array $data){
        try {
            // Cari user berdasarkan ID
            $user = $this->userModel->findOrFail($id);

            // Cek apakah ada password yang akan diupdate
            if (isset($data['password'])) {
                $data['password'] = bcrypt($data['password']);
            }

            // Update data user
            $user->update($data);

            return $user;
        } catch (ModelNotFoundException $e) {
            // Error jika user tidak ditemukan
            throw new Exception("User dengan ID $id tidak ditemukan.", 404);
        } catch (Exception $e) {
            // Error umum lainnya
            throw new Exception("Terjadi kesalahan saat mengupdate data: " . $e->getMessage(), 500);
        }
    }
}
