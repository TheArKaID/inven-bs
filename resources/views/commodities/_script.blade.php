<script>
    $(document).ready(function() {
        $(".show_modal").click(function() {
            let id = $(this).data("id")
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "GET",
                url: "commodities/json/" + id,
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#modalLabel").html(data.data.item_code)
                    $("#item_code").val(data.data.item_code)
                    $("#commodity_location_id").html(data.data.commodity_location_id)
                    $("#name").html(data.data.name)
                    $("#brand").val(data.data.brand)
                    $("#material").val(data.data.material)
                    $("#date_of_purchase").val(data.data.date_of_purchase)
                    $("#school_operational_assistance_id").html(data.data.school_operational_assistance_id)
                    $("#quantity").val(data.data.quantity)
                    $("#price").val(data.data.price)
                    $("#price_per_item").val(data.data.price_per_item)
                    $("#note").html(data.data.note)
                }
            })
        })

        $("form[name='commodity_create']").submit(function(e) {
            e.preventDefault();
            let token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "commodities/json",
                data: {
                    _token: token,
                    school_operational_assistance_id: $("#school_operational_assistance_id_create").val(),
                    commodity_location_id: $("#commodity_location_id_create").val(),
                    item_code: $("#item_code_create").val(),
                    name: $("#name_create").val(),
                    brand: $("#brand_create").val(),
                    material: $("#material_create").val(),
                    date_of_purchase: $("#date_of_purchase_create").val(),
                    condition: $("#condition_create").val(),
                    quantity: $("#quantity_create").val(),
                    price: $("#price_create").val(),
                    price_per_item: $("#price_per_item_create").val(),
                    note: $("#note_create").val(),
                },
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil ditambahkan.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 500)
                },
                error: function(data) {
                    console.log('gagal');
                    console.log(data);
                }
            })
        })

        $(".swal-edit-button").click(function() {
            let id = $(this).data("id");
            let token = $("input[name=_token]").val();

            // Injecting an id with relevant data on click for updating on #swal-update-button
            $("#swal-update-button").attr("data-id", id);

            $.ajax({
                url: "commodities/json/" + id + "/edit",
                type: "GET",
                data: {
                    id: id,
                    _token: token
                },
                success: function(data) {
                    $("#school_operational_assistance_id_edit").val(data.data.school_operational_assistance_id)
                    $("#commodity_location_id_edit").val(data.data.commodity_location_id)
                    $("#item_code_edit").val(data.data.item_code)
                    $("#name_edit").val(data.data.name)
                    $("#brand_edit").val(data.data.brand)
                    $("#material_edit").val(data.data.material)
                    $("#date_of_purchase_edit").val(data.data.date_of_purchase)
                    $("#condition_edit").val(data.data.condition)
                    $("#quantity_edit").val(data.data.quantity)
                    $("#price_edit").val(data.data.price)
                    $("#price_per_item_edit").val(data.data.price_per_item)
                    $("#note_edit").val(data.data.note)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat melihat info kategori buku.", "warning");
                }
            });
        });

        $("#swal-update-button").click(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let id = $("#swal-update-button").attr("data-id");
            let token = $("input[name=_token]").val();

            let name = $("#name_edit").val();
            let description = $("#description_edit").val();

            $.ajax({
                url: "commodities/json/" + id,
                type: "PUT",
                data: {
                    _token: token,
                    school_operational_assistance_id: $("#school_operational_assistance_id_edit").val(),
                    commodity_location_id: $("#commodity_location_id_edit").val(),
                    item_code: $("#item_code_edit").val(),
                    name: $("#name_edit").val(),
                    brand: $("#brand_edit").val(),
                    material: $("#material_edit").val(),
                    date_of_purchase: $("#date_of_purchase_edit").val(),
                    condition: $("#condition_edit").val(),
                    quantity: $("#quantity_edit").val(),
                    price: $("#price_edit").val(),
                    price_per_item: $("#price_per_item_edit").val(),
                    note: $("#note_edit").val(),
                },
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Data berhasil diubah.",
                        icon: "success",
                        timerProgressBar: true,
                        onBeforeOpen: () => {
                            Swal.showLoading();
                            timerInterval = setInterval(() => {
                                const content = Swal.getContent();
                                if (content) {
                                    const b = content.querySelector("b");
                                    if (b) {
                                        b.textContent = Swal.getTimerLeft();
                                    }
                                }
                            }, 100);
                        },
                        showConfirmButton: false
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 800)
                },
                error: function(data) {
                    Swal.fire("Gagal!", "Tidak dapat mengubah data.", "warning");
                }
            });
        });

        $(".swal-delete-button").click(function() {
            Swal.fire({
                title: "Hapus?",
                text: "Data tidak akan bisa dikembalikan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then(result => {
                if (result.value) {
                    let id = $(this).data("id");
                    let token = $("input[name=_token]").val();
                    $.ajax({
                        url: "commodities/json/" + id,
                        type: "DELETE",
                        data: {
                            id: id,
                            _token: token
                        },
                        success: function(data) {
                            Swal.fire({
                                title: "Berhasil",
                                text: "Data berhasil dihapus.",
                                icon: "success",
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading();
                                    timerInterval = setInterval(() => {
                                        const content = Swal.getContent();
                                        if (content) {
                                            const b = content.querySelector("b");
                                            if (b) {
                                                b.textContent = Swal.getTimerLeft();
                                            }
                                        }
                                    }, 100);
                                },
                                showConfirmButton: false
                            });

                            setTimeout(function() {
                                location.reload();
                            }, 500);
                        },
                        error: function(data) {
                            Swal.fire("Gagal!", "Data gagal dihapus.", "warning");
                        }
                    });
                }
            });
        });

    })
</script>