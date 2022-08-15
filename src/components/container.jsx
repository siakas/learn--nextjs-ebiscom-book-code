import styles from '@/styles/container.module.scss'

export default function Container({ children, large = false }) {
  return <div className={large ? styles.large : styles.default}>{children}</div>
}
