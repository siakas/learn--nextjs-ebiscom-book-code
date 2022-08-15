import Head from 'next/head'
import { useRouter } from 'next/router'
import { siteMeta } from '@/lib/constants'

// 汎用 OGP 画像
import siteImg from '@/assets/img/ogp.jpg'

const { siteTitle, siteDesc, siteUrl, siteLocale, siteType, siteIcon } = siteMeta

export default function Meta({ pageTitle, pageDesc, pageImg }) {
  // ページタイトル
  // タイトルが未設定の場合はサイトタイトルを返す
  const title = pageTitle ? `${pageTitle} | ${siteTitle}` : siteTitle

  // ページの説明
  const desc = pageDesc ?? siteDesc

  // ページの URL
  const router = useRouter()
  const url = `${siteUrl}${router.asPath}`

  // OGP 画像
  const img = pageImg || siteImg.src
  const imgUrl = img.startsWith('https') ? img : `${siteUrl}${img}`

  return (
    <Head>
      <title>{title}</title>
      <meta property="og:title" content={title} />

      <meta name="description" content={desc} />
      <meta property="og:description" content={desc} />

      <link rel="canonical" href={url} />
      <meta property="og:url" content={url} />

      <meta property="og:site_name" content={siteTitle} />
      <meta property="og:type" content={siteType} />
      <meta property="og:locale" content={siteLocale} />

      <link rel="icon" href={siteIcon} />
      <link rel="apple-touch-icon" href={siteIcon} />

      <meta property="og:image" content={imgUrl} />
      <meta name="twitter:card" content="summary_large_image" />
    </Head>
  )
}
