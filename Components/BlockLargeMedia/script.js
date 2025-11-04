import { buildRefs, getComponentEl } from '@/scripts/helpers.js'

export default function (el) {
  const refs = buildRefs(el)
  const videoContainer = refs.videoContainer

  if (!videoContainer) {
    return
  }

  // Optional: Add custom video interaction handlers here
  // The Wistia player handles most interactions automatically
  
  // Listen for Wistia API ready event if needed
  window._wq = window._wq || []
  
  // Example: Track when video starts playing
  window._wq.push({
    id: '_all',
    onReady: function(video) {
      // You can add custom analytics or behavior here
      // console.log('Wistia video ready:', video.hashedId())
    }
  })
}

