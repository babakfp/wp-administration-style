;(_=> {
  const font_family_fa_en = '"VazirWOL", "Poppins"'
  const font_family_fa_code = '"VazirWOL", "MonoLisa"'
  const colors = {
    gray: {
			5: '#FAFAFA',
			10: '#F4F4F5',
			20: '#E4E4E7',
			30: '#D4D4D8',
			40: '#A1A1AA',
			50: '#71717A',
			60: '#52525B',
			70: '#3F3F46',
			80: '#27272A',
			90: '#18181B',
    }
  }

  // MCE
  window.addEventListener('load', _=> {

    const wp_editor_wrap = document.querySelector('.wp-editor-wrap')

    if ( ! wp_editor_wrap ) return

    document.head.insertAdjacentHTML('beforeend', `
      <style>
        /* both content types toolbar */
        /*
				.quicktags-toolbar,
        .mce-toolbar-grp,
        .wp-editor-tools {
          width: 100% !important;
          position: unset !important;
          top: unset !important;
        }
				*/

				.mce-toolbar-grp {
					border-right: 2px solid #e5e7eb !important;
				}

        .mce-statusbar {
					height: 0 !important;
					overflow: hidden;
        }
      </style>
    `)

    const mce_ifr_stylesheet = document.querySelector('#wp_administration_style-mce-ifr-css')
    mce_ifr_stylesheet.remove()

    const main_content_ifr = document.getElementById('content_ifr')
    if (main_content_ifr) {
      main_content_ifr.contentWindow.document.head.insertAdjacentHTML('beforeend', `
        <link
          rel="${mce_ifr_stylesheet.getAttribute('rel')}"
          id="${mce_ifr_stylesheet.getAttribute('id')}"
          href="${mce_ifr_stylesheet.getAttribute('href')}"
        >
        
        <style>
          body {
            margin: 26px 16px 16px !important;
            color: ${colors.gray[70]};
						font-family: ${font_family_fa_en} !important;
						background: white !important;
          }
          p {
            margin-top: unset !important;
						margin-bottom: 16px !important;
						line-height: 28px !important;
          }
          h1, h2, h3, h4, h5, h6 {
            margin-top: unset !important;
            margin-bottom: 16px !important;
						font-weight: 600 !important;
          }
					strong, b {
						font-weight: 600 !important;
					}
          h1 { font-size: 38px !important; }
          h2 { font-size: 34px !important; }
          h3 { font-size: 30px !important; }
          h4 { font-size: 26px !important; }
          h5 { font-size: 22px !important; }
          h6 { font-size: 18px !important; }
					blockquote {
						margin: 0 0 16px;
						padding: 24px 32px;
						border-radius: 6px;
						box-shadow: 0 0.125rem 0.3rem -0.0625rem rgb(0 0 0 / 3%), 0 0.275rem 0.75rem -0.0625rem rgb(0 0 0 / 6%) !important;
					}
					blockquote h1, blockquote h2, blockquote h3, blockquote h4, blockquote h5, blockquote h6 {
						margin-bottom: 8px;
						font-style: normal !important;
					}
					blockquote p {
						font-weight: 400 !important;
						font-size: 16px !important;
					}
					a {
						color: #0284c7 !important;
					}
        </style>
      `)
    }

    const wp_editor_area = document.querySelector('.wp-editor-area')
    wp_editor_area.style.setProperty('font-family', font_family_fa_code, 'important')
    wp_editor_area.style.setProperty('direction', 'ltr', 'important')
  })
})();