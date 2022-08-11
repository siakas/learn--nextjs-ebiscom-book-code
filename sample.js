// ---------------------------------------------------------------------
// jQuery.switchDrawer
//
// @version  0.0.2
// @author   Sanshiroh Sakai
// ---------------------------------------------------------------------
(function ($, window, document) {
  "use strict";

  // プラグインのメタ情報を定義
  const namespace = "switchDrawer";
  const version = "0.0.2";

  // プラグインのデフォルトオプションを定義
  const defaults = {};

  // コンストラクタを定義
  function Plugin(element, options) {
    this.element = element;
    this.options = $.extend({}, defaults, options);

    this._defaults = defaults;
    this._name = namespace;
    this._version = version;

    this.init();
  }

  $.extend(Plugin.prototype, {
    init: function () {
      // ハンバーガーメニューの各種 aria 属性値を設定
      const buttonAria = {
        controls: "drawer",
        expanded: "false",
        label: "メインメニュー",
      };

      // ハンバーガーメニューの HTML コードを準備
      const hamburgerStr =
        "<button" +
        " id" +
        '="' +
        "hamburger" +
        '"' +
        " class" +
        '="' +
        "button-hamburger" +
        '"' +
        " type" +
        '="' +
        "button" +
        '"' +
        " aria-controls" +
        '="' +
        buttonAria.controls +
        '"' +
        " aria-expanded" +
        '="' +
        buttonAria.expanded +
        '"' +
        " aria-label" +
        '="' +
        buttonAria.label +
        '"' +
        ">" +
        '<span class="bar"></span>' +
        '<span class="bar"></span>' +
        '<span class="bar"></span>' +
        '<span class="label">MENU</span>' +
        "</button>";

      // 対象要素を取得
      const $hamburger = $(hamburgerStr);
      const $drawer = $("#drawer");
      const $overlay = $("#drawerOverlay");

      // ドロワーの表示状態を保存
      let isDisplay = false;

      // タッチイベントの制御フラグ
      let touch = false;

      // 表示切替のクラス名と付与する要素を設定
      const switchTarget = this.element;

      // 関数定義
      // ---------------------------------------------------------
      // 表示切替
      const switchDrawer = function () {
        // ドロワーの表示状態を切り替え
        isDisplay = isDisplay ? false : true;

        // ドロワーの表示状態に合わせて aria 属性値を変更
        $(switchTarget).attr("data-drawer-active", isDisplay);
        $hamburger.attr("aria-expanded", isDisplay);
        $drawer.attr("aria-hidden", !isDisplay);
        $overlay.attr("aria-hidden", !isDisplay);
      };

      // ハンバーガーボタン設置
      const setButton = function () {
        $drawer.before($hamburger);
      };

      // イベント設定
      // ---------------------------------------------------------
      // ハンバーガー部分をタッチしたらドロワー表示を切り替え
      $(document).on(
        "click touchstart",
        "#hamburger, #drawerClose",
        function (event) {
          // touchstart と click が重複して挙動がおかしくなるのを回避
          switch (event.type) {
            case "touchstart":
              switchDrawer();
              touch = true;
              return false;
              break;
            case "click":
              if (!touch) {
                switchDrawer();
              }
              return false;
              break;
          }
        }
      );

      // 初期化処理
      // ---------------------------------------------------------
      $(switchTarget).attr("data-drawer-active", "false");
      $drawer.attr("aria-hidden", "true");
      $overlay.attr("aria-hidden", "true");
      setButton(); // JS 有効時のみハンバーガーボタンを生成
    },

    // fnName1 : function(elem, options) {}
  });

  // jQuery のプロトタイプにプラグインコンストラクタのインスタンスを格納
  $.fn[namespace] = function (options) {
    return this.each(function () {
      if (!$.data(this, namespace)) {
        $.data(this, namespace, new Plugin(this, options));
      }
    });
  };

  // プラグインの実行
  $(document.documentElement).switchDrawer(); // html 要素に対して実行
})(jQuery, window, document);
