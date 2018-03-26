  // setInterval(function() {

  //   $.ajax({
  //     url: 'http://localhost/e-commerce/pelanggan/cek-barang',
  //     type: 'POST',
  //     data: {},
  //     success: function( response ) {

  //       let count = localStorage.getItem( 'count', 0 );
  //       console.log( count );
  //       let json = $.parseJSON( response );
  //       if ( count != json.length ) {
  //         let options = {
  //           body: 'Ada barang baru nih. Yuk cek web kita..',
  //           icon: 'UserTemplate/images/icons/favicon.png'
  //         };
  //         var notification = new Notification( 'E-Commerce', options );
  //         localStorage.setItem( 'count', json.length );
  //         setTimeout(notification.close.bind(notification), 5000); 
  //       }

  //     },
  //     error: function( err ) {
  //       console.log( err.responseText );
  //     }
  //   });

  // }, 2000);
