'use strict'

$("#btn-signup").click(function () {
	$("#formSignUp").validate({
		rules: {
			fullName: {
				required: true
			},
            username: {
                required: true
            },
            password: {
                required: true
            }
		},
		messages: {
			fullName: {
				required: "Please enter your full name."
			},
            username: {
                required: "Please enter your username."
            },
            password: {
                required: "Please enter your password."
            }
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let fullname = $("#fullName").val();
			let username = $("#username").val();
			let password = $("#password").val();

			$.ajax({
				url: site_url + "Register/insert",
				type: "POST",
				data: {
					fullname: fullname,
                    username: username,
                    password: password
				},
				success: function (data) {
					$("#fullName").val("");
					$("#username").val("");
					$("#password").val("");

					window.location = site_url + 'Auth'
				}
			});
		}
	});
});

$("#btn-signin").click(function () {
	$("#formSignIn").validate({
		rules: {
			txtUsername: {
				required: true
			},
            txtPassword: {
                required: true
            }
		},
		messages: {
			txtUsername: {
				required: "Please enter your username."
			},
            txtPassword: {
                required: "Please enter your password."
            }
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let username = $("#txtUsername").val();
			let password = $("#txtPassword").val();

			$.ajax({
				url: site_url + "Auth/login",
				type: "POST",
				data: {
					username: username,
                    password: password
				},
				success: function (response) {
					$("#txtUsername").val("");
					$("#txtPassword").val("");

					if (response == 'post') {
						window.location.href = site_url + 'Post';
					}else if (response == 'home') {
						window.location.href = site_url + 'Home';
					}else {
						Swal.fire({
							icon: 'error',
							title: 'Login Failed',
							text: 'Incorrect username or password.'
						  });
					}
				}
			});
		}
	});
});

$("#logout").click(function () {
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Are You Sure?',
		text: "Leave Page",
		icon: 'question',
		showCancelButton: true,
		confirmButtonText: 'Yes',
		cancelButtonText: 'No',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {
			window.location.href = site_url + "Auth/logout";
		}
	});
})

// Add Post
$("#showPost").load(site_url + "Post/showData");
$("#savePost").click(function () {
	$("#formPost").validate({
		rules: {
			destination: {
				required: true
			},
            description: {
                required: true
            },
            about: {
                required: true
            },
			image: {
				required: true
			}
		},
		messages: {
			destination: {
				required: "Please enter a destination."
			},
            description: {
                required: "Please enter a description."
            },
            about: {
                required: "Please enter about destination."
            },
			image: {
				required: "Please enter this field"
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		}
	});
});

// Edit Post
$(document).on('click', '.editPost', function () {
	var id_post = $(this).data('id_post');
	var destination = $(this).data('destination');
	var description = $(this).data('description');
	var about = $(this).data('about');
	var image = $(this).data('image');

	$("#id_post").val(id_post);
	$("#editDestination").val(destination);
	$("#editDescription").val(description);
	$("#editAbout").val(about);
	$("#oldImage").val(image);
});

// Update Post
$("#editPost").click(function () {
	$("#formEditPost").validate({
		rules: {
			editDestination: {
				required: true
			},
			editDescription: {
				required: true
			},
			editAbout: {
				required: true
			}
		},
		messages: {
			editDestination: {
				required: "Please enter a destination."
			},
			editDescription: {
				required: "Please enter a description."
			},
			editAbout: {
				required: "Please enter about destination."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let id_post = $("#id_post").val();
			let destination = $("#editDestination").val();
			let description = $("#editDescription").val();
			let about = $("#editAbout").val();
			let img = $("#img").val();
			let oldImage = $("#oldImage").val();

			const swalWithBootstrapButtons = Swal.mixin({
				customClass: {
					confirmButton: 'btn btn-primary',
					cancelButton: 'btn btn-light mr-3'
				},
				buttonsStyling: false
			})

			swalWithBootstrapButtons.fire({
				title: 'Are you sure?',
				text: "Edit data",
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'Cancel',
				reverseButtons: true
			}).then((result) => {
				if (result.value) {

					$.ajax({
						type: "POST",
						url: site_url + "Post/update",
						data: {
							id_post,
							destination,
							description,
							about,
							img,
							oldImage
						},
						success: function (response) {
							console.log(response);
							$("#showPost").load(site_url + "Post/showData");
							$("#editPost").modal("hide");

							Swal.fire(
								'Berhasil!',
								'Data berhasil diubah.',
								'success'
							)
						}
					});
				}
			});
		}
	});
});

// Delete Post
$("#showPost").on('click', '.deletePost', function () {
	var id = $(this).data("id_post");
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
			confirmButton: 'btn btn-primary',
			cancelButton: 'btn btn-light mr-3'
		},
		buttonsStyling: false
	})

	swalWithBootstrapButtons.fire({
		title: 'Are you sure?',
		text: "Delete data",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Delete',
		cancelButtonText: 'Cancel',
		reverseButtons: true
	}).then((result) => {
		if (result.value) {

			$.ajax({
				type: "POST",
				url: site_url + "Post/delete",
				data: {
					id: id
				},
				success: function (data) {
					$("#showPost").load(site_url + "Post/showData");

					Swal.fire(
						'Success!',
						'Deleted data.',
						'success'
					)
				}
			});
		}
	});
});

$("#showComment").load(site_url + "Home/showData");
$("#totalComment").load(site_url + "Home/totalComment");
$("#postComment").click(function () {
	$("#formComment").validate({
		rules: {
			comment: {
				required: true
			}
		},
		messages: {
			comment: {
				required: "Please enter a comment."
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
		},
		submitHandler: function (form) {
			let comment = $("#comment").val();

			$.ajax({
				url: site_url + "Home/comment",
				type: "POST",
				data: {
					comment: comment
				},
				success: function (data) {
					$("#comment").val("");
					$("#showComment").html(data);
					$("#totalComment").load(site_url + "Home/totalComment");
				}
			});
		}
	});
});

$(document).on('click','[data-reply-btn]',function () {
	var el=$(this),
	id_comment=el.data('reply-btn'),
	inputEl=$('[data-reply-input="'+id_comment+'"]'),
	comment=inputEl.val()

	$.ajax({
		url: site_url + "Home/comment/"+id_comment,
		type: "POST",
		data: {
			comment: comment
		},
		success: function (data) {
			$("#showComment").html(data);
			$("#totalComment").load(site_url + "Home/totalComment");
		}
	});
});

$(document).on('click', '.like', function () {
	var el = $(this);
	var like = !(el.data('like') == 1);
	var id_comment = el.data('id_comment');

	$.ajax({
		url: site_url + "Home/like",
		type: "POST",
		dataType: "JSON",
		data: {
			id_comment,
			like
		},
		success: function (response) {
			el.css("color", like?"#1771E6":"#000000");
			el.data('like',like?1:0);

			$('.likes[data-id_comment="'+id_comment+'"]').text(response.likes)
		}
	});
});

$(document).on('click', '.reply', function () {
	var id_comment = $(this).data('id_comment');
	$('[data-reply-input="'+id_comment+'"]').parent().toggle()
});