<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'plugin-development' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ')g7M# %PPI*a(jr,S5bhw,`e3a=IGxWe7@d{)^2ckOd|+UC:{3ce?sS@hoHPhXim' );
define( 'SECURE_AUTH_KEY',  'Z9;M9ycVX@b3LRrW4sf2z0*QRTy>l,Sko)8K$E<-&uw 02?Q.z5[AzvlU=01t9]Q' );
define( 'LOGGED_IN_KEY',    '?O9>zB.l?zFBI@0+/?q`V:<B-?6hP0@Wg?~$HIsZTS]`lSP:QRsQC<`-{;)P[QXI' );
define( 'NONCE_KEY',        'iJod1%jN>LE8sh>&M?4N*!nzoC!$uTlNhvn<43zhO$^mR|D,.es$e5;<X3^9qZ1,' );
define( 'AUTH_SALT',        'FUgO?kNA)LBE&`$6&jh}Y@X!1qka#/h+}1X<$PdTMv,0NB?w@MR!jMdib{H+5I|{' );
define( 'SECURE_AUTH_SALT', '{QuD@)ZZCjP!{Y1B(n3Iju~T]Fn(cFv1Ss##Q e:|rbhal})>]~vWSHUiSE} 6vr' );
define( 'LOGGED_IN_SALT',   'p{Y9UV([G>[Dnh,(ZGOn{W9zp0~8~VGT{_k- P[K?iMX9J3e1}52<h>=NvHbybG,' );
define( 'NONCE_SALT',       'zTYty[J{|j%uH>Uu7s-|e0.vOyYg&zV{=>yT6s*O)0 BA%+8Z7+]C0iHh8/VYbw6' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
