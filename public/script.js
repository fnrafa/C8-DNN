const btnEditKonten = document.querySelectorAll(".edit-konten");
document.addEventListener("DOMContentLoaded", function () {
    const btnDelete = document.querySelectorAll(".btn-delete");

    btnDelete.forEach((btn) => {
        btn.addEventListener("click", (e) => {
            e.preventDefault();
            const form = btn.closest(".delete-form");
            Swal.fire({
                title: "Apakah kamu yakin ingin hapus akun tersebut?",
                showCancelButton: true,
                confirmButtonColor: "#188D16",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batalkan",
            }).then((res) => {
                if (res.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});


document.querySelector('.btn-update').addEventListener('click', function (e) {
    e.preventDefault();
    Swal.fire({
        title: "Apakah kamu yakin ingin update akun tersebut?",
        showCancelButton: true,
        confirmButtonColor: "#188D16",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Update!",
        cancelButtonText: "Batalkan",
    }).then((result) => {
        if (result.isConfirmed) {
            e.target.closest('form').submit();
        }
    });
});

btnEditKonten.forEach((btn) => {
    btn.addEventListener("click", (e) => {
        e.preventDefault();
        Swal.fire({
            title: "Apakah kamu yakin ingin mengubah tampilan?",
            showCancelButton: true,
            confirmButtonColor: "#188D16",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Ubah!",
            cancelButtonText: "Batalkan",
        }).then((res) => {
            if (res.isConfirmed) {
                window.location.href = btn.getAttribute("href");
            }
        });
    });
});
