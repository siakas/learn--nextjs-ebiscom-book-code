import Meta from '@/components/meta'
import Container from '@/components/container'
import Hero from '@/components/hero'

export default function Custom404() {
  return (
    <Container>
      <Meta pagetitle="404 - Page not found" />
      <Hero title="404" subtitle="ページが見つかりません" />
    </Container>
  )
}
