<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define( 'DB_NAME', 'huffie' );

/** MySQL数据库用户名 */
define( 'DB_USER', 'huffie' );

/** MySQL数据库密码 */
define( 'DB_PASSWORD', 'mahaofei' );

/** MySQL主机 */
define( 'DB_HOST', 'localhost' );

/** 创建数据表时默认的文字编码 */
define( 'DB_CHARSET', 'utf8mb4' );

/** 数据库整理类型。如不确定请勿更改 */
define( 'DB_COLLATE', '' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'vehwr4lwUsGEP!x`LKPaQa.:[wI`v7.I1OB4 uX*oz(wDF &UUhhN #=~ig#6+x]' );
define( 'SECURE_AUTH_KEY',  '_pL_ay](xE>U$v_RYPr[Jlyr/*u=<)kXu.d{`+Y=T+ern=782]11dD|@wJv[lF<X' );
define( 'LOGGED_IN_KEY',    'p}C0JZ{ 9<(3`>kF5`QItX?UH,)juM`:D<YeSV;}c?NB{dY+S$,5ppc1t<O[quqh' );
define( 'NONCE_KEY',        '$/AWhh iNo1`FoZ~4JDu#6JZ5i`r6&Cfx3/*>Kb1hS4nH:d2[=fJvu8`J!L|608&' );
define( 'AUTH_SALT',        'w@ v[Rogfo:w*&jKj~$>LsMBT-ND<9Zo)bln}#8o>6@L:I1LRx)P~upz0[`w)sH}' );
define( 'SECURE_AUTH_SALT', '0u2k!~9$FD_9[!HXx}];wd^;5O|b6:`h~PRm_nP,;6jvvf{(U0S(?-wy;SfEPMNT' );
define( 'LOGGED_IN_SALT',   'kIT66+ XGRTpS~jc>]z3ii<ChL)I<<%%f}%w`RwXYSnpb&!_Lkn!cdn?y&vK95d_' );
define( 'NONCE_SALT',       '/5XhL_d]#2(Rc_e0:SRu 5z|pwhmQ!}RkDO7^qD_}g$&,wY:5ux,gWl692&2 5#9' );

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问文档。
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** 设置WordPress变量和包含文件。 */
require_once( ABSPATH . 'wp-settings.php' );
