$(document).ready(function() {
    $('* #show-menu').each(function(index, element) {
        $(element).on('click', function() {
            $("#menu-body").html(" ");
            $.ajax({
                url: "/menus/shows?id=" + $("* #menu_id")[index].value,
                success: (res) => {
                    let menuDetail = `<div class="container-fluid">
                                            <div class="row d-flex">
                                                <div class="col-md">
                                                    <div class="row">
                                                        <div class="col-md-6 p-4 d-flex align-items-center">
                                                            <div class="images">
                                                                <div class="text-center">
                                                                    <img src="storage/${res.picture}" width="200" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md p-4 rounded-end" style="background-color: #eee;">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <span class="ml-1 small">Uploaded : ${res.diff}</span>
                                                                </div>
                                                            </div>
                                                            <div class="mt-4 mb-4">
                                                                <span class="text-uppercase text-muted brand">${res.category}</span>
                                                                <h5 class="text-uppercase">${res.name}</h5>
                                                                <div class="d-flex flex-row align-items-center">
                                                                    <span class="text-primary fw-500 small">IDR ${res.price}</span>
                                                                </div>
                                                            </div>
                                                            <p class="about mt-2">
                                                                ${res.description}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>`;
                    $('#menu-body').html(menuDetail);
                }
            });
        })
    });
})
