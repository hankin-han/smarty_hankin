<?php

namespace Utils;

use \SettingsApi\SettingsApi as SettingsGo;

class Settings {

	/**
	 * @var string 插件名称
	 */
	private $plugin_name;

	/**
	 * @var string 插件版本号
	 */
	private $version;

	/**
	 * @var string 翻译文本域
	 */
	protected $text_domain;

	private $settings_api;

	function __construct( $plugin_name, $version, $text_domain ) {
		$this->plugin_name = $plugin_name;
		$this->text_domain = $text_domain;
		$this->version     = $version;

		$this->settings_api = new SettingsGo;

		add_action( 'admin_init', array( $this, 'admin_init' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}

	function admin_init() {

		//set the settings
		$this->settings_api->set_sections( $this->get_settings_sections() );
		$this->settings_api->set_fields( $this->get_settings_fields() );

		//initialize settings
		$this->settings_api->admin_init();
	}

	function admin_menu() {
		add_plugins_page( $this->plugin_name . __( ' Options', $this->text_domain ), $this->plugin_name, 'manage_options', 'wp-editormd-settings', array( $this, 'plugin_page' ) );
	}

	function get_settings_sections() {
		$sections = array(
			array(
				'id'    => 'editor_basics',
				'title' => __( '常规设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_style',
				'title' => __( '编辑器设置', $this->text_domain )
			),
			array(
				'id'    => 'syntax_highlighting',
				'title' => __( '语法高亮设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_emoji',
				'title' => __( 'Emoji表情设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_toc',
				'title' => __( '文章目录设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_katex',
				'title' => __( '科学公式设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_mermaid',
				'title' => __( '绘图设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_mindmap',
				'title' => __( '思维导图设置', $this->text_domain )
			),
			array(
				'id'    => 'editor_advanced',
				'title' => __( '高级设置', $this->text_domain )
			),
		);

		return $sections;
	}

	/**
	 * Returns all the settings fields
	 *
	 * @return array settings fields
	 */
	function get_settings_fields() {
		$settings_fields = array(
			'editor_basics'       => array(
				array(
					'name'  => 'support_comment',
					'label' => __( '使文章或者页面支持Markdown语法', $this->text_domain ),
					'desc'  => '<a href="' . admin_url( "options-writing.php" ) . '" target="_blank">' . __( '跳转', $this->text_domain ) . '</a>',
					'type'  => 'html'
				),
				array(
					'name'  => 'support_post_page',
					'label' => __( '使评论支持Markdown语法', $this->text_domain ),
					'desc'  => '<a href="' . admin_url( "options-discussion.php#wpcom_publish_comments_with_markdown" ) . '" target="_blank">' . __( '跳转', $this->text_domain ) . '</a>',
					'type'  => 'html'
				),
				array(
					'name'    => 'task_list',
					'label'   => __( '支持Github任务列表', $this->text_domain ),
					'desc'    => __( '仿照Github的任务列表功能', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'imagepaste',
					'label'   => __( '支持图像粘贴', $this->text_domain ),
					'desc'    => __( '让编辑器支持粘贴图像', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'live_preview',
					'label'   => __( '实时预览', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'sync_scrolling',
					'label'   => __( '滚动同步预览', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'html_decode',
					'label'   => __( '支持HTML', $this->text_domain ),
					'desc'    => __( '支持HTML富文本解析，但会增加XSS脚本注入风险', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'static_cdn',
					'label'   => __( '静态资源加速', $this->text_domain ),
					'desc'    => __( '将前端的静态资源放入CDN，来达到网站加速加载,加速文件清单：jQuery,KaTeX,Mermaid,Emoji', $this->text_domain ),
					'type'    => 'radio',
					'options' => array(
						'//cdn.jsdelivr.net'               => __( '推荐使用', $this->text_domain ) . ' JSDelivr',
						'//cdn.bootcss.com'                => __( '路线 - 中国', $this->text_domain ) . ' BootCDN',
						'//cdn.staticfile.org'             => __( '路线 - 中国', $this->text_domain ) . ' Staticfile CDN',
						'//cdnjs.cloudflare.com/ajax/libs' => __( '路线 - 国际', $this->text_domain ) . ' CDNJS'
					),
					'default' => 'default'
				)
			),
			'editor_style'        => array(
				array(
					'name'    => 'theme_style',
					'label'   => __( '编辑器主题风格', $this->text_domain ),
					'desc'    => __( '改变编辑器总体风格', $this->text_domain ),
					'type'    => 'select',
					'options' => array(
						'default' => __( 'default', $this->text_domain ),
						'dark'    => __( 'dark', $this->text_domain )
					),
					'default' => 'default'
				),
				array(
					'name'    => 'code_style',
					'label'   => __( '代码风格主题', $this->text_domain ),
					'desc'    => __( '改变编辑器编写窗口主题', $this->text_domain ),
					'type'    => 'select',
					'options' => array(
						'default'                 => 'default',
						'3024-day'                => '3024-day',
						'3024-night'              => '3024-night',
						'abcdef'                  => 'abcdef',
						'ambiance'                => 'ambiance',
						'ambiance-mobile'         => 'ambiance-mobile',
						'base16-dark'             => 'base16-dark',
						'base16-light'            => 'base16-light',
						'bespin'                  => 'bespin',
						'blackboard'              => 'blackboard',
						'cobalt'                  => 'cobalt',
						'colorforth'              => 'colorforth',
						'dracula'                 => 'dracula',
						'duotone-dark'            => 'duotone-dark',
						'duotone-light'           => 'duotone-light',
						'eclipse'                 => 'eclipse',
						'elegant'                 => 'elegant',
						'erlang-dark'             => 'erlang-dark',
						'gruvbox-dark'            => 'gruvbox-dark',
						'hopscotch'               => 'hopscotch',
						'icecoder'                => 'icecoder',
						'idea'                    => 'idea',
						'isotope'                 => 'isotope',
						'lesser-dark'             => 'lesser-dark',
						'liquibyte'               => 'liquibyte',
						'lucario'                 => 'lucario',
						'material'                => 'material',
						'mbo'                     => 'mbo',
						'mdn-like'                => 'mdn-like',
						'midnight'                => 'midnight',
						'monokai'                 => 'monokai',
						'neat'                    => 'neat',
						'neo'                     => 'neo',
						'night'                   => 'night',
						'oceanic-next'            => 'oceanic-next',
						'panda-syntax'            => 'panda-syntax',
						'paraiso-dark'            => 'paraiso-dark',
						'paraiso-light'           => 'paraiso-light',
						'pastel-on-dark'          => 'pastel-on-dark',
						'railscasts'              => 'railscasts',
						'rubyblue'                => 'rubyblue',
						'seti'                    => 'seti',
						'shadowfox'               => 'shadowfox',
						'solarized'               => 'solarized',
						'ssms'                    => 'ssms',
						'the-matrix'              => 'the-matrix',
						'tomorrow-night-bright'   => 'tomorrow-night-bright',
						'tomorrow-night-eighties' => 'tomorrow-night-eighties',
						'ttcn'                    => 'ttcn',
						'twilight'                => 'twilight',
						'vibrant-ink'             => 'vibrant-ink',
						'xq-dark'                 => 'xq-dark',
						'xq-light'                => 'xq-light',
						'yeti'                    => 'yeti',
						'zenburn'                 => 'zenburn'
					),
					'default' => 'default'
				)
			),
			'syntax_highlighting' => array(
				array(
					'name'  => 'highlight_tip',
					'label' => __( '提示', $this->text_domain ),
					'desc'  => __( '<b>请选择下面任一选项，如果不想加载该功能请留空即可。</b>', $this->text_domain ),
					'type'  => 'html'
				),
				array(
					'name'  => 'highlight_auto_tip',
					'label' => __( '加载模式', $this->text_domain ),
					'desc'  => __( '<b>加载模式 </b> - 自动模式 - 请二选一', $this->text_domain ),
					'type'  => 'html'
				),
				array(
					'name'    => 'highlight_mode_auto',
					'label'   => __( '自动加载模式', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'line_numbers',
					'label'   => __( '行号显示', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'show_language',
					'label'   => __( '显示代码言语', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'copy_clipboard',
					'label'   => __( '代码粘贴', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'highlight_library_style',
					'label'   => __( '语法高亮主题风格', $this->text_domain ),
					'desc'    => __( '改变语法高亮主题', $this->text_domain ),
					'type'    => 'select',
					'options' => array(
						'default'        => 'Default',
						'dark'           => 'Dark',
						'funky'          => 'Funky',
						'okaidia'        => 'Okaidia',
						'twilight'       => 'Twilight',
						'coy'            => 'Coy',
						'solarizedlight' => 'Solarized Light',
						'tomorrow'       => 'Tomorrow Night',
						'customize'       => __( 'Customize Style', $this->text_domain ),
					),
					'default' => 'default'
				),
				array(
					'name'    => 'customize_my_style',
					'label'   => __( '自定义风格样式地址', $this->text_domain ),
					'desc'    => __( '获取 <a href="https://github.com/JaxsonWang/Prism.js-Style" target="_blank" rel="nofollow">主题风格</a>', $this->text_domain ),
					'type'    => 'text',
					'default' => 'notiong'
				),

				array(
					'name'  => 'highlight_customize_tip',
					'label' => __( '加载模式', $this->text_domain ),
					'desc'  => __( '<b>加载模式 -  自定义加载模式</b> - 请二选一', $this->text_domain ),
					'type'  => 'html'
				),
				array(
					'name'    => 'highlight_mode_customize',
					'label'   => __( '自定义加载模式', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'customize_highlight_style',
					'label'   => __( '请填入PrismJS样式文件地址（style）', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'text',
					'default' => 'nothing'
				),
				array(
					'name'    => 'customize_highlight_javascript',
					'label'   => __( '请填入PrismJS脚本文件地址（JavaScript）', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'text',
					'default' => 'nothing'
				)
			),
			'editor_emoji'        => array(
				array(
					'name'    => 'support_emoji',
					'label'   => __( '支持Emoji表情', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				)
			),
			'editor_toc'          => array(
				array(
					'name'    => 'support_toc',
					'label'   => __( '支持文章目录', $this->text_domain ),
					'desc'    => __( '文章目录', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'  => 'toc_tips',
					'label' => __( '你需要安装这个插件', $this->text_domain ),
					'desc'  => '<a class="toc_tips" href="' . admin_url( "plugin-install.php?tab=plugin-information&plugin=table-of-contents-plus&TB_iframe=true " ) . '" rel="nofollow" target="_blank">' . __( '如果你要启用该功能，则需要安装该插件', $this->text_domain ) . '</a>',
					'type'  => 'html'
				)
			),
			'editor_katex'        => array(
				array(
					'name'    => 'support_katex',
					'label'   => __( '支持KaTeX科学公式', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				)
			),
			'editor_mermaid'      => array(
				array(
					'name'    => 'support_mermaid',
					'label'   => __( '支持绘图', $this->text_domain ),
					'desc'    => __( '启用该功能则支持流程图，时序图和甘特图', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				)
            ),
			'editor_mindmap'      => array(
				array(
					'name'    => 'support_mindmap',
					'label'   => __( '支持思维导图', $this->text_domain ),
					'desc'    => __( '', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'customize_mindmap',
					'label'   => __( '自定义MindMap库地址', $this->text_domain ),
					'type'    => 'text',
					'default' => WP_EDITORMD_ABROAD_URL . '/assets/Editormd/lib/mindMap.min.js'
				),
            ),
			'editor_advanced'     => array(
				array(
					'name'    => 'jquery_compatible',
					'label'   => __( '兼容模式', $this->text_domain ),
					'desc'    => __( '如果启用该选项则会加载WordPress自带的jQuery文件并且优先加载，很大的程度上解决文章和页面公式、emoji表情、流程图和时序图失效的问题', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'    => 'katex_compatible',
					'label'   => __( '老版本KaTeX兼容模式', $this->text_domain ),
					'desc'    => __( '如果您在4.X以下(包括4.X)版本使用KaTeX功能编写公式的话，请打开该选项生效！', $this->text_domain ),
					'type'    => 'checkbox',
					'default' => 'off'
				),
				array(
					'name'  => 'debugger',
					'label' => __( '调试信息', $this->text_domain ),
					'desc'  => '<a id="debugger" href="#">' . __( '获取信息（如果出现问题，请把调试信反馈给作者）', $this->text_domain ) . '</a>',
					'type'  => 'html'
				),
                array(
                    'name'  => 'hide_ads',
                    'label'   => __( '隐藏广告', $this->text_domain ),
                    'desc'    => __( '', $this->text_domain ),
                    'type'    => 'checkbox',
                    'default' => 'off'
                ),
			),
		);

		return $settings_fields;
	}

	function plugin_page() {
		echo '<div class="wrap">';

		$this->settings_api->show_navigation();
		$this->settings_api->show_forms();

		echo Debugger::editormd_debug( $this->text_domain );

		if($this->get_option('hide_ads','editor_advanced') == 'off') {
            //判断地区，根据不同的地区进入不同的文档
            switch (get_bloginfo( 'language' )) {
                case 'zh-CN':
                    $donateImgUrl = '//gitee.com/JaxsonWang/JaxsonWang/raw/master/mydonate';
                    break;
                default :
                    $donateImgUrl = '//github.com/JaxsonWang/WP-Editor.md/raw/docs/screenshots';
            }
            echo '<div id="donate">';
            echo '<h3>' . __('Donate', $this->text_domain) . '</h3>';
            echo '<p style="width: 50%">' . __('It is hard to continue development and support for this plugin without contributions from users like you. If you enjoy using WP-Editor.md and find it useful, please consider making a donation. Your donation will help encourage and support the plugin’s continued development and better user support.Thank You!', $this->text_domain) . '</p>';
            echo '<p style="display: table;"><strong style="display: table-cell;vertical-align: middle;">Alipay(支付宝)：</strong><a rel="nofollow" target="_blank" href="'. $donateImgUrl .'/alipay.jpg"><img width="100" src="'. $donateImgUrl .'/alipay.jpg"/></a></p>';
            echo '<p style="display: table;"><strong style="display: table-cell;vertical-align: middle;">WeChat(微信)：</strong><a rel="nofollow" target="_blank" href="'. $donateImgUrl .'/wechart.jpg"><img width="100" src="'. $donateImgUrl .'/wechart.jpg"/></a></p>';
            echo '<p style="display: table;"><strong style="display: table-cell;vertical-align: middle;">PayPal(贝宝)：</strong><a rel="nofollow" target="_blank" href="https://www.paypal.me/JaxsonWang">https://www.paypal.me/JaxsonWang</a></p>';
            echo '</div>';
            echo '</div>';
        }

		$this->script_style();
	}

	/**
	 * Get all the pages
	 *
	 * @return array page names with key value pairs
	 */
	function get_pages() {
		$pages         = get_pages();
		$pages_options = array();
		if ( $pages ) {
			foreach ( $pages as $page ) {
				$pages_options[ $page->ID ] = $page->post_title;
			}
		}

		return $pages_options;
	}

    /**
     * 获取字段值
     *
     * @param string $option 字段名称
     * @param string $section 字段名称分组
     * @param string $default 没搜索到返回空
     *
     * @return mixed
     */
    private function get_option( $option, $section, $default = '' ) {

        $options = get_option( $section );

        if ( isset( $options[ $option ] ) ) {
            return $options[ $option ];
        }

        return $default;
    }

	private function script_style() {
		?>
        <style type="text/css" rel="stylesheet">
            /*设置选项样式*/
            .debugger-wrap {
                margin-top: 10px;
                display: none;
            }

            .debugger-wrap tbody tr {
                width: 100%;
                text-align: left;
            }

            .debugger-wrap tbody tr th {
                padding: 5px 10px 5px 0;
            }

            .debugger-wrap tbody tr th:nth-child(2) {
                color: #006686;
                width: 75%;
            }
        </style>
        <script type="text/javascript">
            (function ($) {
                if (document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').checked === true) {
                    document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').removeAttribute('checked');
                    document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').setAttribute('disabled', 'disabled');
                    document.getElementById('syntax_highlighting[customize_highlight_style]').setAttribute('disabled', 'disabled');
                    document.getElementById('syntax_highlighting[customize_highlight_javascript]').setAttribute('disabled', 'disabled');
                } else {
                    document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').removeAttribute('disabled');
                    document.getElementById('syntax_highlighting[customize_highlight_style]').removeAttribute('disabled');
                    document.getElementById('syntax_highlighting[customize_highlight_javascript]').removeAttribute('disabled');
                }
                if (document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').checked === true) {
                    document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').removeAttribute('checked');
                    document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').setAttribute('disabled', 'disabled');
                    document.getElementById('wpuf-syntax_highlighting[line_numbers]').setAttribute('disabled', 'disabled');
                    document.getElementById('syntax_highlighting[highlight_library_style]').setAttribute('disabled', 'disabled');
                    document.getElementById('syntax_highlighting[customize_my_style]').setAttribute('disabled', 'disabled');
                    document.getElementById('wpuf-syntax_highlighting[show_language]').setAttribute('disabled', 'disabled');
                    document.getElementById('wpuf-syntax_highlighting[copy_clipboard]').setAttribute('disabled', 'disabled');
                } else {
                    document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').removeAttribute('disabled');
                    document.getElementById('wpuf-syntax_highlighting[line_numbers]').removeAttribute('disabled');
                    document.getElementById('syntax_highlighting[highlight_library_style]').removeAttribute('disabled');
                    document.getElementById('syntax_highlighting[customize_my_style]').removeAttribute('disabled');
                    document.getElementById('wpuf-syntax_highlighting[show_language]').removeAttribute('disabled');
                    document.getElementById('wpuf-syntax_highlighting[copy_clipboard]').removeAttribute('disabled');
                }
                document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').addEventListener('click', function () {
                    if (document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').checked === true) {
                        document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').removeAttribute('checked');

                        document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').setAttribute('disabled', 'disabled');
                        document.getElementById('syntax_highlighting[customize_highlight_style]').setAttribute('disabled', 'disabled');
                        document.getElementById('syntax_highlighting[customize_highlight_javascript]').setAttribute('disabled', 'disabled');
                    } else {
                        document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').removeAttribute('disabled');
                        document.getElementById('syntax_highlighting[customize_highlight_style]').removeAttribute('disabled');
                        document.getElementById('syntax_highlighting[customize_highlight_javascript]').removeAttribute('disabled');
                    }
                });
                document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').addEventListener('click', function () {
                    if (document.getElementById('wpuf-syntax_highlighting[highlight_mode_customize]').checked === true) {
                        document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').removeAttribute('checked');
                        document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').setAttribute('disabled', 'disabled');
                        document.getElementById('wpuf-syntax_highlighting[line_numbers]').setAttribute('disabled', 'disabled');
                        document.getElementById('syntax_highlighting[highlight_library_style]').setAttribute('disabled', 'disabled');
                        document.getElementById('syntax_highlighting[customize_my_style]').setAttribute('disabled', 'disabled');
                        document.getElementById('wpuf-syntax_highlighting[show_language]').setAttribute('disabled', 'disabled');
                        document.getElementById('wpuf-syntax_highlighting[copy_clipboard]').setAttribute('disabled', 'disabled');
                    } else {
                        document.getElementById('wpuf-syntax_highlighting[highlight_mode_auto]').removeAttribute('disabled');
                        document.getElementById('wpuf-syntax_highlighting[line_numbers]').removeAttribute('disabled');
                        document.getElementById('syntax_highlighting[highlight_library_style]').removeAttribute('disabled');
                        document.getElementById('syntax_highlighting[customize_my_style]').removeAttribute('disabled');
                        document.getElementById('wpuf-syntax_highlighting[show_language]').removeAttribute('disabled');
                        document.getElementById('wpuf-syntax_highlighting[copy_clipboard]').removeAttribute('disabled');
                    }

                });

                //插入信息
                $('#jquery').text(jQuery.fn.jquery);
                //切换显示信息
                $('#debugger').click(function () {
                    $('.debugger-wrap').fadeToggle();
                    $('#donate').fadeToggle();
                });
                //判断非调试界面则隐藏
                $('a[href!="#editor_advanced"].nav-tab').click(function () {
                    $('.debugger-wrap').fadeOut();
                    $('#donate').fadeIn();
                });
            })(jQuery);
        </script>
		<?php
	}

}