<?php if (!defined('ABSPATH'))
{
    die;
} // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// 唤醒-hankin 主题框架设置
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$themeMessage = _the_theme_name().'_v'._the_theme_version();

$settings = [
    'menu_title' => '主题设置',
    'menu_type' => 'menu',
    'menu_slug' => 'cs-framework',
    'ajax_save' => TRUE,
    'show_reset_all' => FALSE,
    'framework_title' => $themeMessage,
];

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// 框架选项
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options = [];

// ----------------------------------------
// 控制台
// ----------------------------------------
$options[] = [
    'name' => '控制台',
    'title' => '控制台',
    'icon' => 'fa fa-dashboard',
    'fields' => [
        [
            'title' => '系统概况',
            'type' => 'content',
            'content' => getSystemInfo(),
        ],
    ],
];


//if(is_admin() && $_SERVER["QUERY_STRING"]=="page=cs-framework")
//{
  // ------------------------------
  // 初级设置                      -
  // ------------------------------

  $options[] = [
    'name' => 'social',
    'title' => '初级设置',
    'icon' => 'fa fa-cubes',
    'fields' => [

      // logo
      [
        'id' => 'i_avatar_logo',
        'type' => 'upload',
        'title' => 'logo设置',
        'default' => get_template_directory_uri() ."/assets/images/logo2.png",
      ],

      // icon
      [
        'id' => 'i_avatar_icon',
        'type' => 'upload',
        'title' => 'icon设置',
        'default' => get_template_directory_uri() ."/assets/images/logo2.png",
      ],

      // 网站备案号
      [
        'id' => 'i_avatar_beian',
        'type' => 'text',
        'title' => '网站备案号',
        'default' => '',
      ],

      // 自定义底部
      [
        'id' => 'i_avatar_option_footer',
        'type' => 'wysiwyg',
        'title' => '自定义底部',
        'settings' => [
          'textarea_rows' => 5,
          'tinymce' => FALSE,
          'media_buttons' => FALSE,
        ],
      ],

      // 网站公告栏
      [
        'id' => 'i_notice',
        'type' => 'group',
        'title' => '网站公告栏',
        'info' => '',
        'button_title' => '添加公告项',
        'accordion_title' => '公告项',
        'help' => '',
        'fields' => [

          // 公告栏--标题
          [
            'id' => 'i_notice_title',
            'type' => 'text',
            'title' => '公告标题',
            'attributes' => [
              'placeholder' => '例如：smarty_hankin主题上线',
            ],
          ],

          // 公告栏--链接
          [
            'id' => 'i_notice_link',
            'type' => 'text',
            'title' => '公告链接',
            'attributes' => [
              'placeholder' => 'http://...',
            ],
          ],

          // 公告栏--新标签
          [
            'id' => 'i_notice_newtab',
            'type' => 'switcher',
            'title' => '新标签打开',

          ],

        ],
      ],

      // 简介
      [
        'id' => 'i_avatar_content',
        'type' => 'textarea',
        'title' => '简介',
        'default' => '你的简介',
      ],

      // 自定义社交链接
      [
        'id' => 'i_social',
        'type' => 'group',
        'title' => '自定义社交链接',
        'info' => '更多详细设置方式可以浏览使用说明',
        'button_title' => '添加链接项',
        'accordion_title' => '链接项',
        'help' => '社交链接显示在自己的头像下方',
        'fields' => [

          // 自定义社交链接--标题
          [
            'id' => 'i_social_title',
            'type' => 'text',
            'title' => '菜单标题',
            'attributes' => [
              'placeholder' => '例如：我的微博',
            ],
          ],

          // 自定义图标类型
          [
            'id' => 'i_icon_style',
            'type' => 'radio',
            'title' => '图标类型',
            'class' => 'horizontal',
            'options' => [
              'i_icon' => '字体图标',
              'i_image' => '自定义图片',
            ],
            'default' => 'i_icon',
          ],

          // 自定义社交链接--字体图标
          [
            'id' => 'i_social_icon',
            'type' => 'icon',
            'title' => '字体图标',
            'dependency' => ['i_icon_style_i_icon', '==', 'true'],
          ],

          // 自定义社交链接--自定义图片
          [
            'id' => 'i_social_image',
            'type' => 'upload',
            'title' => '自定义图片',
            'dependency' => ['i_icon_style_i_image', '==', 'true'],
            'help' => '自定义图片大小建议不宜超过100px',
          ],

          // 自定义社交链接--链接
          [
            'id' => 'i_social_link',
            'type' => 'text',
            'title' => '菜单链接',
            'attributes' => [
              'placeholder' => 'http://...',
            ],
          ],

          // 自定义社交链接--新标签
          [
            'id' => 'i_social_newtab',
            'type' => 'switcher',
            'title' => '新标签打开',
            'dependency' => ['i_social_link', '!=', ''],
          ],

        ],
      ],
    ],
  ];
  // ------------------------------
  // 公众设置                      -
  // ------------------------------
  $options[] = [
      'name' => 'wx_data',
      'title' => '微信公众号设置',
      'icon' => 'fa fa-bug',
      'fields' => [
        //设置说明
        [
          'type' => 'notice',
          'class' => 'info',
          'content' => '可实现 分享到QQ 微信 好友 朋友圈 带有标题、描述、文章封面',
        ],
        // 关键词
        [
          'id' => 'i_appId',
          'type' => 'text',
          'title' => 'AppID',
          'help' => '开发者ID是公众号开发识别码，配合开发者密码可调用公众号的接口能力',
        ],

        // 关键词
        [
          'id' => 'i_appSecret',
          'type' => 'text',
          'title' => 'AppSecret',
          'help' => '开发者密码是校验公众号开发者身份的密码，具有极高的安全性。切记勿把密码直接交给第三方开发者或直接存储在代码中。如需第三方代开发公众号，请使用授权方式接入。',
        ],

      ],
    ];

  // ------------------------------
  // 高级设置                      -
  // ------------------------------

  $options[] = [
    'name' => 'rule',
    'title' => '高级设置',
    'icon' => 'fa fa-send',
    'fields' => [

/*      // 开启付款二维码
      [
        'id' => 'i_aside_pay',
        'type' => 'switcher',
        'title' => '开启付款二维码',
        'default' => FALSE,
      ],

      // 开启网站禁止使用：鼠标右键\F12\CTRL+SHIFT+I等
      [
        'id' => 'i_document_keydown',
        'type' => 'switcher',
        'title' => '禁止查看网站源代码',
      ],

      // 网站维护设置
      [
        'id' => 'i_web_weihu',
        'type' => 'switcher',
        'title' => '网站维护设置',
      ],

      // 网站后台登录背景设置
      [
        'id' => 'i_admin_login_bg',
        'type' => 'upload',
        'title' => '网站后台登录背景设置',
        'default' => "https://www.hankin.cn/wp-content/themes/hankin/images/login_bg.jpg",
      ],*/

      // 使用markdown编辑器
      [
        'id' => 'i_markdown_option',
        'type' => 'switcher',
        'title' => '使用markdown编辑器',
        'help' => '注意：开启 保存后 请刷新页面',
        'label' => '<font color="red">注意：开启 保存后 请刷新页面</font>',
      ],
    ],
  ];

  // ------------------------------
  // 页面元素                         -
  // ------------------------------
/*
  $options[] = [
    'name' => 'pageElement',
    'title' => '页面元素',
    'icon' => 'fa fa-navicon',
    'fields' => [
      //顶部导航栏
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => '顶部导航栏',
        'help' => '',
      ],


      // 显示侧边抽屉按钮
      [
        'id' => 'i_navbar_aside_folded_button',
        'type' => 'switcher',
        'title' => '显示侧边抽屉按钮',
        'label' => '',
      ],

      // 显示博主信息按钮
      [
        'id' => 'i_navbar_aside_user_button',
        'type' => 'switcher',
        'title' => '显示博主信息按钮',
        'label' => '',
      ],

      //左侧导航菜单
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => '左侧导航菜单',
      ],

      // 显示博主信息
      [
        'id' => 'i_navbar_aside_user',
        'type' => 'switcher',
        'title' => '显示博主信息',
        'label' => '',
      ],

      // 显示-导航
      [
        'id' => 'i_navbar_aside_nav',
        'type' => 'switcher',
        'title' => '显示导航',
        'label' => '',
      ],

      // 显示-组成（分类）
      [
        'id' => 'i_navbar_aside_group_category',
        'type' => 'switcher',
        'title' => '显示组成（分类）',
        'label' => '',
      ],

      // 显示-组成（页面）
      [
        'id' => 'i_navbar_aside_group_page',
        'type' => 'switcher',
        'title' => '显示组成（页面）',
        'label' => '',
      ],

      // 启用最新消息功能
      [
        'id' => 'i_message_new',
        'title' => '启用最新消息功能',
        'type' => 'switcher',
      ],

      // 最新消息
      [
        'id' => 'i_message_content',
        'type' => 'wysiwyg',
        'title' => '消息内容',
        'default' => '<a href="https://www.hankin.cn/theme-hankin" class="media list-group-item">
                                <span class="clear block m-b-none words_contents">
                                <strong class="text-success">郑重申明:</strong> 唤醒-hankin本主题是hankin本人独立开发，有人说很像  <code>handsome</code> ，那是因为本主题UI  <code>Bootstrap-Admin-Angulr</code> 本来就是来源的，没有什么授权不授权这一说，本主题是wordpress版本！请大家知息…<br>
                                <small class="text-muted text-info">2018-06-04 20:40:58</small>
                                </span>
                                </a>',
        'settings' => [
          'textarea_rows' => 15,
          'tinymce' => TRUE,
          'media_buttons' => TRUE,
        ],
        'dependency' => [
          'i_message_new',
          '==',
          'true',
        ],
      ],
    ],
  ];
*/

  // ------------------------------
  // 页面元素                         -
  // ------------------------------
  $options[] = [
    'name' => 'theme',
    'title' => '外观设置',
    'icon' => 'fa fa-globe',
    'fields' => [
      //基本设置
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => '基本设置',
      ],

      // 显示换肤按钮
      [
        'id' => 'i_theme_switch',
        'type' => 'switcher',
        'title' => '显示换肤按钮',
        'label' => '',
        'help' => '',
      ],

      // 设置背景
      [
        'id' => 'i_theme_background',
        'type' => 'upload',
        'title' => '背景设置',
        'dependency' => ['i_theme_switch', '==', 'false' ],
      ],
      [
        'id' => 'i_theme_box_center',
        'type' => 'switcher',
        'title' => '居中模式',
        'dependency' => ['i_theme_switch', '==', 'false' ],
        'default' => TRUE,
      ],
      [
        'id' => 'i_theme_blur_layouts',
        'type' => 'switcher',
        'title' => '毛玻璃效果',
        'dependency' => ['i_theme_switch', '==', 'false' ],
        'default' => FALSE,
        'label' => '<font color="red">注：开启后会增加浏览器内存消耗</font>',
      ],

    ],
  ];

  // ------------------------------
  // 文章设置                       -
  // ------------------------------

  $options[] = [
    'name' => 'article',
    'title' => '文章设置',
    'icon' => 'fa fa-list-alt',
    'fields' => [

      // 文章设置
      [
        'id' => 'i_article',
        'type' => 'radio',
        'title' => '列表形式',
        'options' => [
          'list-left' => '列表式（左图）',
          'list-top' => '列表式（上图）',
          'card-top' => '卡片式',
        ],
        'default' => 'list-left',
      ],
/*
      // 无限加载文章
      [
        'id' => 'i_article_page_load',
        'type' => 'switcher',
        'title' => '开启无限加载文章',
      ],

      // 阅读文章 侧边栏开启文章标题目录树
      [
        'id' => 'i_article_page_tree',
        'type' => 'switcher',
        'title' => '侧边栏开启文章标题目录树',
      ],

      // 文章默认封面
      [
        'id' => 'i_article_bing_thumbnail',
        'type' => 'switcher',
        'title' => '文章默认封面使用微软Bing封面',
      ],*/

      // 开启文章页打赏按钮
      [
        'id' => 'i_dashang_check',
        'type' => 'switcher',
        'title' => '开启文章页打赏按钮',
      ],

      // 文章页打赏作者（微信）
      [
        'id' => 'i_dashang_weixin',
        'type' => 'upload',
        'title' => '文章页打赏作者（微信',
        'default' => "",
      ],

      // 文章页打赏作者（支付宝）
      [
        'id' => 'i_dashang_zhifubao',
        'type' => 'upload',
        'title' => '文章页打赏作者（支付宝',
        'default' => "",
      ],

    ],
  ];
/*
  // ------------------------------
  // 评论设置                       -
  // ------------------------------

  $options[] = [
    'name' => 'comments',
    'title' => '评论设置',
    'icon' => 'fa fa-comment',
    'fields' => [

      // 显示用户UserAgent信息 以及用户归属地
      [
        'id' => 'i_comments_userAgent',
        'type' => 'switcher',
        'default' => FALSE,
        'title' => '显示UserAgent/归属地信息',
      ],

      // 自定义评论框-图片
      [
        'id' => 'i_comments_image',
        'type' => 'upload',
        'title' => '自定义评论框图片',
        'default' => 'https://www.hankin.cn/wp-content/themes/hankin/images/97-bashen.gif',
      ],

      // SMPT设置
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => 'SMPT设置',
      ],
      // 启用SMPT功能
      [
        'id' => 'i_comment_smpt',
        'title' => '启用SMPT功能',
        'type' => 'switcher',
      ],
      // 发件人的名称
      [
        'id' => 'i_smpt_name',
        'type' => 'text',
        'default' => 'Admin',
        'title' => '发件人的名称',
        'dependency' => [
          'i_comment_smpt',
          '==',
          'true',
        ],
      ],
      // SMTP服务器
      [
        'id' => 'i_smpt_server',
        'type' => 'text',
        'default' => 'smtp.qq.com',
        'title' => 'SMTP服务器',
        'dependency' => [
          'i_comment_smpt',
          '==',
          'true',
        ],
      ],
      // SMTP端口
      [
        'id' => 'i_smpt_port',
        'type' => 'text',
        'default' => '25',
        'title' => 'SMTP端口',
        'dependency' => [
          'i_comment_smpt',
          '==',
          'true',
        ],
      ],
      // 邮箱账号
      [
        'id' => 'i_smpt_email',
        'type' => 'text',
        'title' => '邮箱账号',
        'dependency' => [
          'i_comment_smpt',
          '==',
          'true',
        ],
      ],
      // 邮箱密码
      [
        'id' => 'i_smpt_password',
        'type' => 'password',
        'title' => '邮箱密码',
        'dependency' => [
          'i_comment_smpt',
          '==',
          'true',
        ],
      ],
      // 提醒设置
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => '提醒设置',
      ],
      // 启用邮件提醒
      [
        'id' => 'i_comment_mail',
        'title' => '启用邮件提醒',
        'type' => 'switcher',
        'default' => TRUE,
      ],
      // 评论审核通过通知用户
      [
        'id' => 'i_mail_approve',
        'type' => 'switcher',
        'title' => '评论审核通过通知用户',
        'default' => TRUE,
        'dependency' => [
          'i_comment_mail',
          '==',
          'true',
        ],
      ],
      // 评论回复通知用户
      [
        'id' => 'i_mail_reply',
        'type' => 'switcher',
        'title' => '评论回复通知用户',
        'default' => TRUE,
        'dependency' => [
          'i_comment_mail',
          '==',
          'true',
        ],
      ],
      // 网站后台登录失败通知管理员
      [
        'id' => 'i_mail_login',
        'type' => 'switcher',
        'title' => '网站后台登录失败通知管理员',
        'dependency' => [
          'i_comment_mail',
          '==',
          'true',
        ],
      ],
      // 注册用户资料信息更新通知用户
      [
        'id' => 'i_mail_update',
        'type' => 'switcher',
        'title' => '注册用户资料信息更新通知用户',
        'dependency' => [
          'i_comment_mail',
          '==',
          'true',
        ],
      ],
      // 注册用户账户被管理员删除通知用户
      [
        'id' => 'i_mail_delete',
        'type' => 'switcher',
        'title' => '注册用户账户被管理员删除通知用户',
        'dependency' => [
          'i_comment_mail',
          '==',
          'true',
        ],
      ],
      // 网站发布新文章通知用户
      [
        'id' => 'i_mail_newpost',
        'type' => 'switcher',
        'title' => '网站发布新文章通知用户',
        'dependency' => [
          'i_comment_mail',
          '==',
          'true',
        ],
      ],

    ],
  ];
*/
  // ------------------------------
  // 音乐设置                         -
  // ------------------------------
  $options[] = [
    'name' => 'music_option',
    'title' => '音乐设置',
    'icon' => 'fa fa-music',
    'fields' => [

      //播放器设置
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => '播放器设置',
      ],

      // 开启播放器
      [
        'id' => 'i_music_check',
        'type' => 'switcher',
        'title' => '开启播放器',
      ],

      // 开启自动播放
      [
        'id' => 'i_music_auto_play',
        'type' => 'switcher',
        'title' => '开启自动播放',
      ],


      // 音乐循环
      [
        'id' => 'i_music_loop',
        'type' => 'select',
        'options' => [
          'false' => '单曲循环',
          'true' => '列表循环',
        ],
        'default' => 'true',
        'title' => '音乐循环',
      ],

      //解释
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => "URL形如<code>https://music.163.com/#/my/m/music/playlist?id==9474056</code>ID即为<code>id=</code>后面的数字",
      ],

      // 音乐播放列表id
      [
        'id' => 'i_music_value',
        'type' => 'text',
        'default' => 9474056,
        'title' => '音乐播放列表id',
      ],

    ],
  ];

  // ------------------------------
  // 幻灯片                      -
  // ------------------------------

  $options[] = [
    'name' => 'slider',
    'title' => '幻灯片',
    'icon' => 'fa fa-image',
    'fields' => [

      // 首页开启幻灯片
      [
        'id' => 'i_slider',
        'type' => 'switcher',
        'title' => '首页开启幻灯片',
        'help' => '注意：幻灯片只显示在主页，图片尺寸1600*500！请慎重选择图片',
      ],

      /*// 幻灯片切换效果
      [
        'id' => 'i_slider_effect',
        'type' => 'select',
        'title' => '切换效果',
        'options' => [
          'slide' => 'slide-默认',
          'fade' => 'fade-淡入',
          'cube' => 'cube-方块',
          'coverflow' => 'coverflow-3d流',
          'flip' => 'flip-3d翻转',
        ],
        'default' => 'slide',
      ],*/

      // 自定义幻灯片
      [
        'id' => 'i_slider_custom',
        'type' => 'group',
        'title' => '自定义幻灯片',
        'info' => '更多详细设置方式可以浏览使用说明',
        'button_title' => '添加滑块',
        'accordion_title' => '滑块',
        'fields' => [

          // 自定义幻灯片--标题
          /*[
            'id' => 'i_slider_title',
            'type' => 'text',
            'title' => '标题',
            'attributes' => [
              'placeholder' => '例如：滑块01',
            ],
          ],*/

          // 自定义幻灯片--图片
          [
            'id' => 'i_slider_image',
            'type' => 'upload',
            'title' => '图片',
          ],

          // 自定义幻灯片--描述
          /*[
            'id' => 'i_slider_text',
            'type' => 'text',
            'title' => '描述',
            'attributes' => [
              'placeholder' => '输入描述',
            ],
          ],*/

          // 自定义幻灯片--链接
          [
            'id' => 'i_slider_link',
            'type' => 'text',
            'title' => '链接',
            'attributes' => [
              'placeholder' => 'http://...',
            ],
          ],

          // 自定义幻灯片--新标签
          [
            'id' => 'i_slider_newtab',
            'type' => 'switcher',
            'title' => '新标签打开',
          ],

        ],
      ],

    ],
  ];

  // ----------------------------------------
  // 友情链接
  // ----------------------------------------

  $options[] = [
    'name' => 'links',
    'title' => '友情链接',
    'icon' => 'fa fa-link',
    'fields' => [

      // 自定义社交链接
      [
        'id' => 'i_links',
        'type' => 'group',
        'title' => '自定义友情链接',
        'info' => '更多详细设置方式可以浏览使用说明',
        'button_title' => '添加链接项',
        'accordion_title' => '链接项',
        'help' => '友情链接显示在自己的头像下方',
        'fields' => [

          // 自定义社交链接--标题
          [
            'id' => 'i_links_title',
            'type' => 'text',
            'title' => '友情链接标题',
            'attributes' => [
              'placeholder' => '例如：xxx的Blog',
            ],
          ],
          // 自定义社交链接--描述
          [
            'id' => 'i_links_descript',
            'type' => 'textarea',
            'title' => '友情链接描述',
            'attributes' => [
              'placeholder' => '填写友情链接描述',
            ],
          ],
          // 自定义社交链接--链接
          [
            'id' => 'i_links_link',
            'type' => 'text',
            'title' => '友情链接地址',
            'attributes' => [
              'placeholder' => 'http://...',
            ],
          ],

        ],
      ],

    ],
  ];

  // ------------------------------
  // SEO                       -
  // ------------------------------

  $options[] = [
    'name' => 'seo',
    'title' => 'SEO',
    'icon' => 'fa fa-bug',
    'fields' => [

      //基本信息
      [
        'type' => 'notice',
        'class' => 'info',
        'content' => '基本信息',
      ],

      // 关键词
      [
        'id' => 'i_seo_keywords',
        'type' => 'textarea',
        'title' => '关键字',
        'help' => '标识页面是关于什么的关键词，通常在搜索引擎中使用',
      ],

      // 描述
      [
        'id' => 'i_seo_description',
        'type' => 'textarea',
        'title' => '描述',
        'help' => '页面的简短描述',
      ],

    ],
  ];
  // ----------------------------------------
  // 自定义代码
  // ----------------------------------------

  $options[] = [
    'name' => 'code',
    'title' => '自定义代码',
    'icon' => 'fa fa-code',
    'fields' => [

      // 自定义CSS
      [
        'id' => 'i_css',
        'type' => 'textarea',
        'before' => '<h4>自定义CSS</h4>',
        'after' => '<p class="cs-text-muted">注意：无需写入<strong>&lt;style></strong>标签。</p>',
      ],

      // 自定义javascript
      [
        'id' => 'i_js',
        'type' => 'textarea',
        'before' => '<h4>自定义javascript</h4>',
        'after' => '<p class="cs-text-muted">注意：无需写入<strong>&lt;script></strong>标签。</p>',
      ],

      // 统计代码
      [
        'id' => 'i_js_tongji',
        'type' => 'textarea',
        'before' => '<h4>统计代码</h4>',
        'after' => '<p class="cs-text-muted">注意：无需写入<strong>&lt;script></strong>标签。',
      ],

    ],
  ];

  // ------------------------------
  // 备份                       -
  // ------------------------------
  $options[] = [
    'name' => 'advanced',
    'title' => '备份',
    'icon' => 'fa fa-shield',
    'fields' => [
      [
        'type' => 'notice',
        'class' => 'warning',
        'content' => '您可以保存当前的选项，下载一个备份和导入.',
      ],
      // 备份
      [
        'type' => 'backup',
      ],
    ],
  ];
//}

// ------------------------------
// 关于唤醒                       -
// ------------------------------
/*
$options[] = [
    'name' => 'about',
    'title' => '关于唤醒',
    'icon' => 'fa fa-info-circle',
    'fields' => [

        // 关于主题
        [
            'type' => 'content',
            'content' => '<iframe src="https://www.hankin.cn/about.html" style="width:100%;height:900px;"></iframe>',
        ],

    ],
];
*/
CSFramework::instance($settings, $options);
