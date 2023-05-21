import {
  useGlobalState,
  setGlobalState,
  setLoadingMsg,
  setAlert,
} from '../store'
import { updateNFT } from '../Blockchain.Services'
import { useState } from 'react'
import { FaTimes } from 'react-icons/fa'

const UpdateNFT = () => {
  const [modal] = useGlobalState('updateModal')
  const [nft] = useGlobalState('nft')
  const [price, setPrice] = useState('')

  const handleSubmit = async (e) => {
    e.preventDefault()
    if (!price || price <= 0) return

    setGlobalState('modal', 'scale-0')
    setGlobalState('loading', { show: true, msg: 'Initiating price update...' })

    try {
      setLoadingMsg('Price updating...')
      setGlobalState('updateModal', 'scale-0')

      await updateNFT({ ...nft, cost: price })
      setAlert('Price updated...', 'green')
      window.location.reload()
    } catch (error) {
      console.log('Error updating file: ', error)
      setAlert('Update failed...', 'red')
    }
  }
}
  

export default UpdateNFT
