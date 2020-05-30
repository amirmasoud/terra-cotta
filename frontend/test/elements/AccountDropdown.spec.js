import { shallowMount } from '@vue/test-utils'
import AccountDropdown from '@/components/elements/AccountDropdown.vue'

describe('AccountDropdown', () => {
  const wrapper = shallowMount(AccountDropdown, {
    mocks: {
      $t: () => {}
    }
  })

  it('is a Vue instance', () => {
    expect(wrapper).toBeTruthy()
  })

  it('background click should close the dropdown', async () => {
    const button = wrapper.find('.account-btn')
    await button.trigger('click')
    expect(wrapper.vm.isOpen).toBe(true)
    const close = wrapper.find('.full-w-close-btn')
    await close.trigger('click')
    expect(wrapper.vm.isOpen).toBe(false)
  })
})
