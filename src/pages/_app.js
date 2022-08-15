import '@/styles/globals.scss'
import Layout from '@/components/layout'

// Font Awesome 用の設定（公式サイトより抜粋）
// https://fontawesome.com/docs/web/use-with/react/use-with
import '@fortawesome/fontawesome-svg-core/styles.css'
import { config } from '@fortawesome/fontawesome-svg-core'
config.autoAddCss = false

function MyApp({ Component, pageProps }) {
  return (
    <Layout>
      <Component {...pageProps} />
    </Layout>
  )
}

export default MyApp
