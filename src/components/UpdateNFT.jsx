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

  console.log('nft', nft)
  

export default UpdateNFT
