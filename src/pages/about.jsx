import Meta from '@/components/meta'
import Container from '@/components/container'
import Hero from '@/components/hero'
import PostBody from '@/components/post-body'
import Contact from '@/components/contact'
import { TwoColumn, TwoColumnMain, TwoColumnSidebar } from '@/components/two-column'
import Accordion from '@/components/accordion'
import Image from 'next/image'
// import eyecatch from '@/assets/img/about.jpg'

const eyecatch = {
  src: 'https://images.microcms-assets.io/assets/9431d86cef0d4081a4298f8ef072644b/e0624d6d39784e699c15a4699df051fa/about.jpg',
  height: 960,
  width: 1920,
  blurDataURL:
    'data:image/jpeg;base64,/9j/2wBDAAYEBQYFBAYGBQYHBwYIChAKCgkJChQODwwQFxQYGBcUFhYaHSUfGhsjHBYWICwgIyYnKSopGR8tMC0oMCUoKSj/2wBDAQcHBwoIChMKChMoGhYaKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCj/wAARCAACAAQDASIAAhEBAxEB/8QAFQABAQAAAAAAAAAAAAAAAAAAAAb/xAAfEAABBAICAwAAAAAAAAAAAAABAAIDBAYRBSESEzH/xAAUAQEAAAAAAAAAAAAAAAAAAAAG/8QAFxEAAwEAAAAAAAAAAAAAAAAAAAMyAf/aAAwDAQACEQMRAD8Aq8GvW7l7LxbtTzivz1iCESyF3rjayPxY3fxo2dAddoiJAucAbbP/2Q==',
}

export default function About() {
  return (
    <Container>
      <Meta pageTitle="アバウト" pageDesc="About development activities" pageImg={eyecatch.src} />

      <Hero title="About" subtitle="About develoopment activities" />

      <figure>
        <Image
          src={eyecatch}
          alt=""
          layout="responsive"
          sizes="(min-width: 1152px) 1152px, 100vw"
          priority
          placeholder="blur"
        />
      </figure>

      <TwoColumn>
        <TwoColumnMain>
          <PostBody>
            <p>
              Cubeが得意とする分野はモノづくりです。三次元から二次元の造形、プログラミングやデザインなど、さまざまな技術を組み合わせることによって、社会と環境を結びつけるクリエイティブを提案し続けています。
            </p>
            <h2>モノづくりで目指していること</h2>
            <p>
              モノづくりではデータの解析からクリエイティブまで幅広いことを担当しています。新しいことを取り入れながら、ユーザーにマッチした提案を実現するのが目標です。たくさんの開発・提供が数合多くありますが、特にそこを磨く作業に力を入れています。
            </p>
            <p>
              単純に形にするだけでなく、作る過程や、なぜそのようにしたのかを大事にしながらものづくりをしています。毎回、課題解決のテーマをもって「モノ」と向き合い制作をし、フィードバックしてもらうことで自分の中にあるモヤモヤを言葉にして「問い」への答えを出しています。
            </p>
            <p>次のことに注意して制作をしています。</p>
            <ul>
              <li>会社の規範となるべき規則、約束事</li>
              <li>企業が目指すべき目的、目標を達成するために必要な考え方</li>
              <li>企業にすばらしい社格を与える</li>
              <li>人間としての正しい生き方、あるべき姿</li>
            </ul>
            <h3>新しいことへのチャレンジ</h3>
            <p>
              今までと違うものを作ることで愛着が湧いてきます。そこで興味を持ったことは小さなことでもいいから取り入れて、良いものを作れるようにしています。小さなヒントから新しいものを生み出すようなモノづくりは、これからも続けていきたいです。
            </p>

            <h2>FAQ</h2>

            <Accordion heading="プログラミングのポイントについて">
              <p>
                プログラミングのポイントは、作りたいものを作ることです。楽しいことから思いつき、目標とゴールを決め、そこに向かってさまざまな課題を設定していきながら、プログラムを作っていきます。
              </p>
            </Accordion>

            <Accordion heading="古代語の解読について">
              <p>
                古代語を解読するのに必要なのは、書かれた文字そのものだけです。古代の世界観や思考方法、それらを読み取ってこそ古代の世界観が理解できてきます。
              </p>
            </Accordion>

            <Accordion heading="公開リポジトリの活用について">
              <p>
                公開リポジトリを活用すると、全世界のどこからでもアクセスし、開発者が関連するプロジェクトのタスクを利用することができます。
              </p>
            </Accordion>
          </PostBody>
        </TwoColumnMain>

        <TwoColumnSidebar>
          <Contact />
        </TwoColumnSidebar>
      </TwoColumn>
    </Container>
  )
}
