    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('peminjaman', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('ruang_id');
                $table->foreign('ruang_id')->references('id')->on('ruang')->onDelete('cascade');
                $table->unsignedBigInteger('peminjam_id');
                $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('NamaPeminjam');
                $table->date('TanggalPinjam');
                $table->time('JamMulai');
                $table->time('JamSelesai');
                $table->string('Deskripsi');
                $table->string('TimPelayanan');
                $table->string('Jumlah');
                $table->string('Persetujuan')->default('pending');
                $table->string('Pengaduan');
                $table->boolean('Aduan1')->nullable();
                $table->boolean('Aduan2')->nullable();
                $table->text('Aduan3')->nullable(); 
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('peminjaman');
        }
    };
