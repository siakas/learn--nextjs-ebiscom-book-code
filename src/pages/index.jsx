import Meta from '@/components/meta'
import Container from '@/components/container'
import Hero from '@/components/hero'

const EachPost = ({ title, url }) => {
  return (
    <article>
      <a href={url}>
        <h3>{title}</h3>
      </a>
    </article>
  )
}

const Decoration = ({ children }) => {
  return <div style={{ color: 'red' }}>{children}</div>
}

export default function Home() {
  const props1 = {
    title: 'スケジュール管理と猫の理論',
    url: '/blog/schedule/',
  }
  const props2 = {
    title: '音楽が呼び起こす美味しいものの記憶',
    url: '/blog/music/',
  }

  return (
    <Container>
      <Meta />

      <Hero title="CUBE" subtitle="アウトプットしていくサイト" imageOn />

      <section>
        <h2>おすすめ記事</h2>
        <EachPost {...props1} />
        <EachPost {...props2} />
      </section>

      <Decoration>
        <h1>CUBE</h1>
        <p>なんてすばらしいサイト！</p>
      </Decoration>
    </Container>
  )
}
