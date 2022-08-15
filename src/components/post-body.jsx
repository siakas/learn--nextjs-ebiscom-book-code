import styles from '@/styles/post-body.module.scss'

export default function PostBody({ children }) {
  return <div className={styles.stack}>{children}</div>
}
