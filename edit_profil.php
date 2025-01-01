<?php
session_start();
require "functions.php";

if (isset($_POST["simpan"])) {
      if (edit($_POST) > 0) {
        echo "<script>
              alert('Berhasil Diubah');
              </script>";

        echo "<script>window.location.href = 'index.php';</script>";
      } else {
        echo "<script>
              alert('Gagal Diubah');
              </script>";
        echo "<script>window.location.href = 'index.php';</script>";
      }
    }