<?php

namespace Rubygroup\WebProfileSekolah\Validation;

use Rubygroup\WebProfileSekolah\Exception\ValidationException;

class ValidationUtil
{
    public function validateImageFile(array $file): void
    {
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        $fileName = $file['name'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (empty($fileName)) {
            throw new ValidationException('Tidak ada perubahan, File gambar tidak boleh kosong.');
        }

        if ($file['size'] > 5000000) {
            throw new ValidationException('Ukuran file gambar tidak boleh lebih dari 5MB.');
        }

        if ($file['error'] !== 0) {
            throw new ValidationException('File gambar tidak valid.');
        }

        if (!in_array($fileExtension, $allowedExtensions)) {
            throw new ValidationException('File gambar tidak valid. Hanya file JPG, JPEG, dan PNG yang diperbolehkan.');
        }
    }

    // Validasi string agar tidak kosong
    public function validate(string $value, string $fieldName): void
    {
        if (empty($value)) {
            throw new ValidationException("Field $fieldName tidak boleh kosong.");
        }
    }

}